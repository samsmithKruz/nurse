<?php

class admin_ extends Database
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUser($email)
    {
        $this->db->query("select *, null as password from users where email=:email");
        $this->db->bind(":email", $email);
        return $this->db->single();
    }
    public function countEnrolled($f = "")
    {
        $this->db->query("select count(email) as total from users where enrollment_status = " . ($f == "" ? "1" : "0"));
        return $this->db->single()->total;
    }
    public function getFileNames()
    {
        $this->db->query("select filename,id from file_uploads");
        return $this->db->resultSet();
    }
    public function add_link($data, $section_type = 'general_library')
    {
        $url = Auth::safe_data($data['link']);
        if (preg_match('/^(https?:\/\/|www\.)/i', $url) !== 1) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Invalid link, must start with http,https or www.",
            ));
        }
        $this->db->query("insert into add_link(section_type,filename) values(:section_type ,:filename)");
        $this->db->bind(":filename", $url);
        $this->db->bind(":section_type", $section_type);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "Link uploaded.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Link not uploaded.",
        ));
    }
    public function add_file($id, $section_type = 'general_library')
    {
        $this->db->query("select file_id from add_file where section_type=:section_type and file_id=:file_id");
        $this->db->bind(":file_id", $id);
        $this->db->bind(":section_type", $section_type);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "File already added.",
            ));
        }


        $this->db->query("insert into add_file(section_type,file_id) values(:section_type ,:file_id)");
        $this->db->bind(":file_id", $id);
        $this->db->bind(":section_type", $section_type);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "File added.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "File not added.",
        ));
    }
    public function add_timetable($id, $section_type = 'general_library')
    {
        $this->db->query("select file_id from add_timetable where section_type=:section_type and file_id=:file_id");
        $this->db->bind(":file_id", $id);
        $this->db->bind(":section_type", $section_type);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "File already added.",
            ));
        }


        $this->db->query("insert into add_timetable(section_type,file_id) values(:section_type ,:file_id)");
        $this->db->bind(":file_id", $id);
        $this->db->bind(":section_type", $section_type);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "Timetable added.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Timetable not added.",
        ));
    }
    public function add_test($id, $class)
    {
        $this->db->query("select id from add_test where class=:class and test_id=:test_id");
        $this->db->bind(":test_id", $id);
        $this->db->bind(":class", $class);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Test already added.",
            ));
        }


        $this->db->query("insert into add_test(test_id,class) values(:test_id ,:class)");
        $this->db->bind(":class", $class);
        $this->db->bind(":test_id", $id);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "Test added.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Test not added.",
        ));
    }
    public function remove_file($data)
    {
        $section = Auth::safe_data($data['section']);
        $id = Auth::safe_data($data['id']);
        $type = Auth::safe_data($data['type']);

        $sql = "delete from add_$type where section_type=:section and id=:id";
        $this->db->query($sql);
        $this->db->bind(":section", $section);
        $this->db->bind(":id", $id);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "Removed successfully.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Unable to Remove file/link.",
        ));
    }
    public function sanitize_questions($data)
    {
        // Initialize an array to store questions and their options
        $questions = [];

        // Iterate over the data array
        foreach ($data as $key => $value) {
            // Check if the key starts with 'q' followed by a digit
            if (preg_match('/^q\d+$/', $key)) {
                // Extract the question number
                $questionNumber = substr($key, 1);

                // Skip the question if it is empty
                if (empty($value)) {
                    continue;
                }


                // Initialize the question if not already
                if (!isset($questions[$questionNumber])) {
                    $questions[$questionNumber] = [
                        'question' => '',
                        'correct_option' => '',
                        'options' => []
                    ];
                }

                // Set the question text
                $questions[$questionNumber]['question'] = $value;
            } elseif (preg_match('/^correct_option_q(\d+)$/', $key, $matches)) {
                // Extract the question number from the key
                $questionNumber = $matches[1];

                // Set the correct option
                $questions[$questionNumber]['correct_option'] = $value;
            } elseif (preg_match('/^option\d+_q(\d+)$/', $key, $matches)) {
                // Extract the question number from the key
                $questionNumber = $matches[1];

                // Add the option to the options array
                $questions[$questionNumber]['options'][] = $value;
            }
        }
        return $questions;
    }
    public function new_test($post, $questions)
    {
        $question_name = Auth::safe_data($post['question_name']);
        $question_time = Auth::safe_data($post['question_time']);
        if (strlen($question_name) == 0 || strlen($question_time) == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Test name and time is invalid.",
            ));
        }
        $this->db->query("select name from test where name=:name");
        $this->db->bind(":name", $question_name);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Test with same name already exists.",
            ));
        }
        while (true) {
            $id = bin2hex(random_bytes(4));
            $this->db->query("select id from test where id=:id");
            $this->db->bind(":id", $id);
            $this->db->execute();
            if ($this->db->rowCount() == 0) {
                break;
            }
        }
        if (count($questions) > 0) {
            $this->db->query("insert into test(id,name,time) values(:id,:name,:time)");
            $this->db->bind(":id", $id);
            $this->db->bind(":name", $question_name);
            $this->db->bind(":time", $question_time);
            $this->db->execute();
            if ($this->db->rowCount() > 0) {
                foreach ($questions as $key => $e) {

                    $test_id = $id;
                    $question = $e['question'];
                    $correct = $e['correct_option'];
                    $op1 = $e['options'][0];
                    $op2 = $e['options'][1];
                    $op3 = $e['options'][2];


                    $this->db->query("insert into test_questions(test_id,correct_op,op1,op2,op3,question) values(:test_id,:correct_op,:op1,:op2,:op3,:question)");
                    $this->db->bind(":test_id", $test_id);
                    $this->db->bind(":correct_op", $correct);
                    $this->db->bind(":op1", $op1);
                    $this->db->bind(":op2", $op2);
                    $this->db->bind(":op3", $op3);
                    $this->db->bind(":question", $question);
                    $this->db->execute();
                    if ($this->db->rowCount() == 0) {
                        return Helpers::response(array(
                            'state' => 0,
                            'message' => "Database Error uploading test questions.",
                        ));
                    }
                }
                return Helpers::response(array(
                    'state' => 1,
                    'message' => "Test uploaded successfully.",
                ));
            } else {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "Error uploading test.",
                ));
            }
        }
        return $questions;
    }
    public function getTests()
    {
        $this->db->query("select * from test");
        return $this->db->resultSet();
    }
    public function loadUploadedTest($id)
    {
        $this->db->query("
        SELECT 
            test.*,
            test_questions.*
        FROM test
        LEFT JOIN test_questions on
            test_questions.test_id = test.id
        WHERE test.id = :id
        ");
        $this->db->bind(":id", $id);
        $result =  $this->db->resultSet();
        return $this->shuffleResults($result);
    }
    public function delete_test($id)
    {
        $this->db->query("delete from test_questions where test_id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Database Error: Unable to delete test.",
            ));
        }
        $this->db->query("delete from test where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Database Error: Unable to delete test.",
            ));
        }
        return Helpers::response(array(
            'state' => 1,
            'message' => "Test deleted successfullly.",
        ));
    }
    public function start_test($id)
    {
        $this->db->query("update add_test set status=1 where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Unable to start test.",
            ));
        }
        return Helpers::response(array(
            'state' => 1,
            'message' => "Test started.",
        ));
    }
    public function end_test($id)
    {
        $this->db->query("update add_test set status=0 where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Unable to end test.",
            ));
        }
        return Helpers::response(array(
            'state' => 1,
            'message' => "Test Ended.",
        ));
    }
    public function remove_test($id)
    {
        $this->db->query("delete from add_test where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Unable to remove test.",
            ));
        }
        return Helpers::response(array(
            'state' => 1,
            'message' => "Test removed successfully.",
        ));
    }
    public function add_notice($notice)
    {
        $this->db->query("insert into add_notice(notice_text) values(:notice_text)");
        $this->db->bind(":notice_text", $notice);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Unable to add notice.",
            ));
        }
        return Helpers::response(array(
            'state' => 1,
            'message' => "Notice added successfully.",
        ));
    }
    public function delete_notice($id)
    {
        $this->db->query("delete from add_notice where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Notice not deleted.",
            ));
        }
        return Helpers::response(array(
            'state' => 1,
            'message' => "Notice deleted.",
        ));
    }
    public function getNotices()
    {
        $this->db->query("select * from add_notice");
        return $this->db->resultSet();
    }
    public function shuffleResults($result)
    {
        $ob = [];
        foreach ($result as $object) {
            $options = [
                'correct_op' => $object->correct_op,
                'op1' => $object->op1,
                'op2' => $object->op2,
                'op3' => $object->op3
            ];

            // Shuffle the options
            $shuffledOptions = $options;
            shuffle($shuffledOptions);

            // Update the object with shuffled options
            $object->op1 = $shuffledOptions[0];
            $object->op2 = $shuffledOptions[1];
            $object->op3 = $shuffledOptions[2];
            $object->op4 = $shuffledOptions[3];  // Update correct_op to its new position
            array_push($ob, $object);
        }
        return $ob;
    }
    public function remove_student($email)
    {
        $sql = "delete from users where email=:email and not is_admin = 1; delete from test_score where user_id=:email";
        $this->db->query($sql);
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "Student Removed successfully.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Unable to Remove Student.",
        ));
    }
    function uploadFile($filename, $files)
    {
        $this->db->query("select filename from file_uploads where filename=:filename");
        $this->db->bind(":filename", $filename);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "File with this name already exists.",
            ));
        }
        // Allowed file extensions
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt', 'mp3', 'xlsx', 'wav', 'ogg'];

        if (strlen($files['full_path']) > 0) {

            // Step 2: Handle the file upload
            $uploadDir = UPLOAD_FILE_PATH;
            $fileTmpPath = $files['tmp_name'];
            $fileOriginalName = $files['name'];
            $fileExtension = strtolower(pathinfo($fileOriginalName, PATHINFO_EXTENSION));

            // Check if the file extension is allowed
            if (!in_array($fileExtension, $allowedExtensions)) {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "Error: File type not allowed.",
                ));
            }

            $newFileName = $filename . "" . bin2hex(random_bytes(2)) . '.' . $fileExtension;
            $dest_path = $uploadDir . $newFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }


            // Check file size
            if ($files["size"] > UPLOAD_FILE_SIZE * 1024 * 1024) {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "Sorry, your file is too large.",
                ));
            }



            // Move the file to the upload directory
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Step 3: Insert data into the database
                $this->db->query("insert into file_uploads(filename,source) values(:filename,:source)");
                $this->db->bind(":filename", $filename);
                $this->db->bind(":source", $newFileName);
                $this->db->execute();

                if ($this->db->rowCount() == 0) {
                    return Helpers::response(array(
                        'state' => 0,
                        'message' => "file not added to database",
                    ));
                }
                return Helpers::response(array(
                    'state' => 1,
                    'message' => "File uploaded.",
                ));
            } else {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "There was an error moving the uploaded file.",
                ));
            }
        } else {
            return Helpers::response(array(
                'state' => 0,
                'message' => "No file found.",
            ));
        }
    }
    function deleteUpload($id)
    {
        $file = UPLOAD_FILE_PATH . $id;

        $this->db->query("delete from file_uploads where source=:source");
        $this->db->bind(":source", $id);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            if (unlink($file)) {
                return Helpers::response(array(
                    'state' => 1,
                    'message' => "File deleted.",
                ));
            }
            return Helpers::response(array(
                'state' => 0,
                'message' => "Unable to delete file from folder.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "File not found in database.",
        ));
    }
    function markTest($post)
    {
        $id = Auth::safe_data($post['id']);

        $this->db->query("select score from test_score where test_id=:test_id and user_id=:user_id");
        $this->db->bind(":test_id",$id);
        $this->db->bind(":user_id",$_SESSION[APP]->email);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return Helpers::response(array(
                'state' => 0,
                'message' => "Test already submitted.",
            ));
        }



        $score = 0;
        $questions = array_filter($post, function ($key) {
            return $key !== 'id';
        }, ARRAY_FILTER_USE_KEY);
        $this->db->query("select count(correct_op) as total from test_questions where test_id=:test_id");
        $this->db->bind(":test_id", $id);
        $total_questions = $this->db->single()->total;
        foreach ($questions as $key => $value) {
            $this->db->query("select correct_op from test_questions where question_id=:question_id and test_id=:test_id and correct_op=:correct_op");
            $this->db->bind(":test_id", $id);
            $this->db->bind(":correct_op", $value);
            $this->db->bind(":question_id", $key);
            $this->db->execute();
            if ($this->db->rowCount() > 0) {
                $score++;
            }
        }
        $result = number_format(($score / $total_questions) * 100, 0);
        $this->db->query("insert into test_score(test_id,user_id,score) values(:test_id,:user_id,:score)");
        $this->db->bind(":test_id",$id);
        $this->db->bind(":user_id",$_SESSION[APP]->email);
        $this->db->bind(":score",$result);
        $this->db->execute();
        return Helpers::response(array(
            'state' => 1,
            'message' => "Test submitted.",
        ));
    }
    function getTestScore($id)
    {

        $this->db->query("
        SELECT 
            test_score.score,
            test.name,
            test.time
        from 
            test_score
        LEFT join test on 
            test.id = test_score.test_id
        where 
            test_score.test_id=:test_id and test_score.user_id=:user_id
        ");
        $this->db->bind(":test_id",$id);
        $this->db->bind(":user_id",$_SESSION[APP]->email);
        return $this->db->single();
    }
    function updateUser($post){
        $email = @Auth::safe_data($post['email']);
        $enrollment = @Auth::safe_data($post['enrollment']);
        $enrollment_date = @Auth::safe_data($post['enrollment_date']);
        $class = @Auth::safe_data($post['class']) ?? "";

        $sql = "update users set enrollment_status =:enrollment, enrollment_date =CAST(:date AS DATETIME)";
        if(strlen($class) > 0){
            $sql .= ", current_class = '$class'";
        }
        $sql .= " where email=:email";
        $this->db->query($sql);
        $this->db->bind(":email",$email);
        $this->db->bind(":enrollment",$enrollment);
        $this->db->bind(":date",$enrollment_date);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return Helpers::response(array(
                'state' => 1,
                'message' => "Student updated.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "No changes made.",
        ));
    }
    function unregisterUser($post){
        $email = @Auth::safe_data($post['email']);

        $sql = "update users set enrollment_status =0, enrollment_date ='0000-00-00 00:00:00', current_class=''";
        $sql .= " where email=:email";
        $this->db->query($sql);
        $this->db->bind(":email",$email);
        $this->db->execute();
        if($this->db->rowCount() > 0){
            return Helpers::response(array(
                'state' => 1,
                'message' => "Student Unregistered.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "No changes made.",
        ));
    }
    
}
