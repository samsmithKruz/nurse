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
        $this->db->query("select count(email) as total from users where enrollment_status = " . ($f == "" ? "1" : "0") . " and not (is_admin = 1 or is_admin=2)");
        return $this->db->single()->total;
    }
    public function countStaffs()
    {
        $this->db->query("select count(email) as total from users where is_admin =1 ");
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
    public function new_test_name($post)
    {
        $question_id = Auth::safe_data(@$post['test_id']) ?? "";
        $question_name = Auth::safe_data($post['question_name']);
        $question_time = Auth::safe_data($post['question_time']);

        if (strlen($question_name) == 0 || strlen($question_time) == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Test name and time is invalid.",
            ));
        }
        if (strlen($question_id) == 0) {
            $this->db->query("select name from new_test where name=:name");
            $this->db->bind(":name", $question_name);
            $this->db->execute();
            if ($this->db->rowCount() > 0) {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "Test with same name already exists.",
                ));
            }
            while (true) {
                $question_id = bin2hex(random_bytes(4));
                $this->db->query("select id from test where id=:id");
                $this->db->bind(":id", $question_id);
                $this->db->execute();
                if ($this->db->rowCount() == 0) {
                    break;
                }
            }
            $this->db->query("insert into new_test(id,name,time) values(:id,:name,:time)");
            $this->db->bind(":id", $question_id);
            $this->db->bind(":name", $question_name);
            $this->db->bind(":time", $question_time);
            $this->db->execute();
            if ($this->db->rowCount() > 0) {
                return (object)['state' => 1, 'message' => "Test created successfully", 'id' => $question_id];
            }
            return (object)['state' => 0, 'message' => 'Unable to create test'];
        } else {
            $this->db->query("update new_test set name=:name,time=:time where id=:id");
            $this->db->bind(":name", $question_name);
            $this->db->bind(":time", $question_time);
            $this->db->bind(":id", $question_id);
            $this->db->execute();
            if ($this->db->rowCount() > 0) {
                return Helpers::response(array(
                    'state' => 1,
                    'id' => $question_id,
                    'message' => "Test updated successfully.",
                ));
            }
            return (object)['state' => 1, 'id' => $question_id, 'message' => 'Welcome'];
        }
    }
    public function get_test_name($id)
    {
        $this->db->query("select * from new_test where id=:id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
    public function getTests()
    {
        $this->db->query("select * from new_test");
        return $this->db->resultSet();
    }
    public function loadUploadedTest($id)
    {
        $this->db->query("
        SELECT 
            new_test_questions.question,
            new_test_questions.question_id
        FROM new_test_questions 
        WHERE
            new_test_questions.test_id = :id
        ");
        $this->db->bind(":id", $id);
        $questions =  $this->db->resultSet();
        return $this->prepareQuestions($questions);
    }
    private function prepareQuestions($questions)
    {
        $result = [];
        foreach ($questions as $question) {
            $q = new stdClass;
            $q->question = $question->question;
            $q->question_id = $question->question_id;

            $this->db->query("select option_id, question_id, is_correct, option_text,rationale from new_question_options where question_id=:id");
            $this->db->bind(":id", $question->question_id);
            $q->options = $this->db->resultSet();
            shuffle($q->options);

            $this->db->query("select path from new_rationale where question_id=:id");
            $this->db->bind(":id", $question->question_id);
            $q->rationale = $this->db->resultSet();

            array_push($result, $q);
        }
        shuffle($result);
        return $result;
    }
    public function delete_test($id)
    {
        $this->db->query("delete from new_test where id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();

        if ($this->db->rowCount() == 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Unable to delete test.",
            ));
        }


        $this->db->query("
        select 
            new_question_options.question_id
        from new_question_options
        join new_test_questions on 
            new_test_questions.question_id = new_question_options.question_id
        where
            new_test_questions.test_id =:id
        ;
        ");
        $this->db->bind(":id", $id);
        $questions = $this->db->resultSet();

        foreach ($questions as $key => $question) {
            $this->db->query("
            delete from new_question_options where question_id=:id;
            delete from new_test_questions where question_id=:id;
            ");
            $this->db->bind(":id", $question->question_id);
            $this->db->execute();
            $this->deleteRationale($question->question_id);
        }
        return Helpers::response(array(
            'state' => 1,
            'message' => "Test deleted successfully",
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
    public function add_staff($email)
    {
        $sql = "update users set is_admin=1, enrollment_status=1 where email=:email and not is_admin = 2";
        $this->db->query($sql);
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "Student Promoted to staff.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Unable to promote student.",
        ));
    }
    public function remove_staff($email)
    {
        $sql = "update users set is_admin=0 where email=:email and not is_admin = 2";
        $this->db->query($sql);
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 1,
                'message' => "Staff Demoted successfully.",
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Unable to Demote staff.",
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
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt', 'mp3', 'xlsx', 'wav', 'ogg', 'mp4', 'mkv', '3gp', 'avi', 'wmv', 'flv', 'webm', 'm4v', 'ogg'];

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



    private function uploadRationale($file, $index = 0, $question_id)
    {
        $this->db->query("delete from new_rationale where path like '" . $question_id . "_%'");
        $this->db->execute();

        // Allowed file extensions
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt', 'mp3', 'xlsx', 'wav', 'ogg', 'mp4', 'mkv', '3gp', 'avi', 'wmv', 'flv', 'webm', 'm4v', 'ogg'];

        if (strlen($file['full_path'][$index]) > 0) {
            $old_uploads = glob(UPLOAD_RATIONALE_PATH . $question_id . "_*");
            foreach ($old_uploads as $file_) {
                if (file_exists($file_)) {
                    unlink($file_);
                }
            }
            // Step 2: Handle the file upload
            $fileTmpPath = $file['tmp_name'][$index];
            $fileOriginalName = $file['name'][$index];
            $fileExtension = strtolower(pathinfo($fileOriginalName, PATHINFO_EXTENSION));

            // Check if the file extension is allowed
            if (!in_array($fileExtension, $allowedExtensions)) {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "Error: File type not allowed.",
                ));
            }

            $newFileName = $question_id . "_$index" . "_" . bin2hex(random_bytes(2)) . '.' . $fileExtension;
            $dest_path = UPLOAD_RATIONALE_PATH . $newFileName;

            if (!is_dir(UPLOAD_RATIONALE_PATH)) {
                mkdir(UPLOAD_RATIONALE_PATH, 0777, true);
            }


            // Check file size
            if ($file["size"][$index] > UPLOAD_FILE_SIZE * 1024 * 1024) {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "Sorry, your file is too large.",
                ));
            }

            // Move the file to the upload directory
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Step 3: Insert data into the database
                $this->db->query("insert into new_rationale(question_id,path) values(:question_id,:path)");
                $this->db->bind(":question_id", $question_id);
                $this->db->bind(":path", $newFileName);
                $this->db->execute();

                if ($this->db->rowCount() == 0) {
                    return Helpers::response(array(
                        'state' => 0,
                        'message' => "Rationale not added to database",
                    ));
                }
            } else {
                return Helpers::response(array(
                    'state' => 0,
                    'message' => "There was an error uploading rationale.",
                ));
            }
        } else {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Rationale is undefined.",
            ));
        }
    }
    private function deleteRationale($question_id)
    {
        $this->db->query("delete from new_rationale where path like '" . $question_id . "_%'");
        $this->db->execute();
        $old_uploads = glob(UPLOAD_RATIONALE_PATH . $question_id . "_*");
        foreach ($old_uploads as $file_) {
            if (file_exists($file_)) {
                unlink($file_);
            }
        }
    }

    public function new_add_question()
    {
        $test_id = Auth::safe_data($_GET['id']);
        $quest = Auth::safe_data($_POST['quest_']);
        $options = [];
        for ($i = 1; $i <= 4; $i++) {
            $options[] = [
                'text' => $_POST["opt{$i}"],
                'is_correct' => isset($_POST["opt{$i}_correct"]) ? 1 : 0,
                'rationale' => $_POST["opt{$i}_reason"]
            ];
        }

        if (empty($_POST['q_id'])) {

            // Add new question
            while (true) {
                $question_id = bin2hex(random_bytes(8));
                $this->db->query("select question_id from new_test_questions where question_id=:id");
                $this->db->bind(":id", $question_id);
                $this->db->execute();
                if ($this->db->rowCount() == 0) {
                    break;
                }
            }
            $sql = "INSERT INTO new_test_questions (question_id,test_id,question) VALUES (:question_id,:test_id,:question)";
            $sqlOptions = "INSERT INTO new_question_options (question_id, option_text, is_correct, rationale) VALUES (:question_id, :option_text, :is_correct, :reason)";
        } else {
            // Update question
            $question_id = Auth::safe_data($_POST['q_id']);
            $sql = "UPDATE new_test_questions SET 
            test_id=:test_id,
            question=:question
            WHERE question_id=:question_id
            ";

            // Insert/Update question
            $this->db->query("DELETE from new_question_options where question_id=:question_id;");
            $this->db->bind(':question_id', $question_id);
            $this->db->execute();

            $sqlOptions = " 
            INSERT INTO 
            new_question_options (question_id, option_text, is_correct, rationale) 
            VALUES (:question_id, :option_text, :is_correct, :reason)";
        }

        // Insert/Update question
        $this->db->query($sql);
        $this->db->bind(':question_id', $question_id);
        $this->db->bind(':test_id', $test_id);
        $this->db->bind(':question', $quest);
        $this->db->execute();

        // Insert/Update question options
        foreach ($options as $option) {
            $this->db->query($sqlOptions);
            $this->db->bind(':question_id', $question_id);
            $this->db->bind(':option_text', $option['text']);
            $this->db->bind(':is_correct', $option['is_correct']);
            $this->db->bind(':reason', $option['rationale']);
            $this->db->execute();
        }
        // Upload rationale
        if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
            $i = count($_FILES['images']['name']);
            while ($i > 0) {
                $this->uploadRationale($_FILES['images'], $i - 1, $question_id);
                $i--;
            }
        }

        return (object)['state' => 1, 'message' => 'Question added sucessfully', 'question_id' => $question_id];
    }
    public function new_delete_question()
    {
        $test_id = Auth::safe_data($_GET['id']);
        $question_id = Auth::safe_data($_GET['q_id']);

        // Insert/Update question
        $this->db->query("DELETE FROM new_test_questions WHERE question_id=:question_id AND test_id=:test_id;
            DELETE FROM new_question_options WHERE question_id=:question_id
            ");
        $this->db->bind(':question_id', $question_id);
        $this->db->bind(':test_id', $test_id);
        $this->db->execute();
        $this->deleteRationale($question_id);
        return (object)['state' => 1, 'message' => "Question deleted successfully."];
    }

    public function get_test_question($question_id)
    {
        $this->db->query("
        SELECT 
            new_test_questions.question,
            new_question_options.option_text,
            new_question_options.is_correct,
            new_question_options.rationale
        FROM new_test_questions
        LEFT JOIN new_question_options ON
            new_question_options.question_id = new_test_questions.question_id
        WHERE 
            new_test_questions.question_id=:question_id
        ");
        $this->db->bind(":question_id", $question_id);
        return $this->db->resultSet();
    }

    public function get_question_ids($test_id)
    {
        $this->db->query("
        SELECT *
        FROM new_test_questions
        WHERE 
            test_id=:test_id order by date asc
        ");
        $this->db->bind(":test_id", $test_id);
        return $this->db->resultSet();
    }


    private function markTest($test_id, $email = "")
    {
        $email = $email == "" ? $_SESSION[APP]->email : $email;

        // Fetch all test submissions for the given test_id and user_id
        $this->db->query("SELECT * FROM test_submit WHERE test_id = :test_id AND user_id = :user_id");
        $this->db->bind(":test_id", $test_id);
        $this->db->bind(":user_id", $email);
        $options = $this->db->resultSet();

        $user_score = 0;
        $total_questions = 0;

        // Fetch all the required data in one go to reduce the number of queries
        $question_ids = array_column($options, 'question_id');
        if (empty($question_ids)) {
            return 0; // No questions to process
        }
        // $question_ids_str = implode(',', array_map('intval', $question_ids));
        $question_ids_str = implode(',', array_map(function ($item) {
            return '"' . $item . '"';
        }, $question_ids));

        // Fetch correct options for all questions
        $this->db->query("
            SELECT 
                option_id,
                question_id
            FROM new_question_options 
            WHERE question_id IN ($question_ids_str) and is_correct=1
        ");
        $correct_options = $this->db->resultSet();
        $correct_options_map = [];
        foreach ($correct_options as $correct_option) {
            $correct_options_map[$correct_option->question_id] = $correct_options_map[$correct_option->question_id] ?? [];
            array_push($correct_options_map[$correct_option->question_id], $correct_option->option_id);
        }
        foreach ($options as $option) {
            $submitted = explode(",", $option->choice);
            $correct = $correct_options_map[$option->question_id] ?? 0;

            // Total number of correct options
            $totalCorrectOptions = count($correct);

            // Check if there are correct options
            if ($totalCorrectOptions > 0) {

                // Calculate the number of correct and incorrect submissions
                $totalSubmittedOptions = count($submitted);

                if ($totalSubmittedOptions > 0) {
                    $totalIncorrectSubmitted = count(array_diff($submitted, $correct));

                    // Calculate the deduction
                    $deduction = $totalIncorrectSubmitted / $totalSubmittedOptions;

                    // Calculate the score
                    $score = max(0, 1 - $deduction); // Score cannot be less than 0
                } else {
                    // If no options are submitted, set score to 0
                    $score = 0;
                }
            } else {
                // If there are no correct options, handle as needed
                // Here we assume that if there are no correct options, score is 0
                $score = 0;
            }

            $user_score += $score;
        }

        // Fetch the total number of questions for the test
        $this->db->query("
            SELECT 
                COUNT(test_id) AS total
            FROM new_test_questions
            WHERE test_id = :test_id
        ");
        $this->db->bind(":test_id", $test_id);
        $total_questions = $this->db->single()->total;
        if ($total_questions > 0) {
            return ($user_score / $total_questions) * 100;
        } else {
            return 0; // Avoid division by zero
        }
    }
    function submitTest($test_id, $questions)
    {
        $this->db->query("SELECT test_id from test_score where user_id=:user_id and test_id=:test_id");
        $this->db->bind(":test_id", $test_id);
        $this->db->bind(":user_id", $_SESSION[APP]->email);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return Helpers::response(array(
                'state' => 0,
                'message' => "Test already submitted.",
            ));
        }
        foreach ($questions as $id => $options) {
            $this->db->query("
            INSERT INTO test_submit(test_id,question_id,user_id,choice)
            values(:test_id,:question_id,:user_id,:choice)
            ");
            $this->db->bind(":test_id", $test_id);
            $this->db->bind(":question_id", $id);
            $this->db->bind(":choice", implode(",", $options));
            $this->db->bind(":user_id", $_SESSION[APP]->email);
            $this->db->execute();
        }

        $score = number_format($this->markTest($test_id), 2);
        $this->db->query("
        INSERT INTO test_score(test_id,user_id,score)
        values(:test_id,:user_id,:score)
        ");
        $this->db->bind(":test_id", $test_id);
        $this->db->bind(":score", $score);
        $this->db->bind(":user_id", $_SESSION[APP]->email);
        $this->db->execute();
        return Helpers::response(array(
            'state' => 1,
            'message' => "Test scored.",
            'score' => $score
        ));
    }
    function re_markTest($class,$test_id)
    {
        $this->db->query("SELECT email from users where current_class =:class");
        $this->db->bind(":class", $class);
        $users = $this->db->resultSet();
        $sql = "";
        foreach($users as $user){
            $score = number_format($this->markTest($test_id, $user->email), 2);
            $email = $user->email;
            $sql .= " UPDATE test_score 
                SET score=$score
                WHERE user_id= '$email'; " ;
        }
        if($sql != ""){
            $this->db->query($sql);
            $this->db->execute();
            return Helpers::response(array(
                'state' => 1,
                'message' => "Test remarked."
            ));
        }
        return Helpers::response(array(
            'state' => 0,
            'message' => "Test not remarked."
        ));
    }
    function getSubmitted($test_id, $user_id = "")
    {
        $user_id = $user_id == "" ? $_SESSION[APP]->email : $user_id;
        $this->db->query("SELECT question_id, choice from test_submit where test_id=:test_id and user_id=:user_id");
        $this->db->bind(":test_id", $test_id);
        $this->db->bind(":user_id", $user_id);
        $submitted = $this->db->resultSet();
        $result = new stdClass;
        foreach ($submitted as $i => $el) {
            $result->{$el->question_id} = explode(",", $el->choice);
        }
        return $result;
    }
    function getTestScore($id)
    {

        $this->db->query("
        SELECT 
            test_score.score as score
        from 
            test_score
        where 
            test_score.test_id=:test_id and test_score.user_id=:user_id
        ");
        $this->db->bind(":test_id", $id);
        $this->db->bind(":user_id", $_SESSION[APP]->email);
        return $this->db->single()->score;
    }
    function updateUser($post)
    {
        $email = @Auth::safe_data($post['email']);
        $enrollment = @Auth::safe_data($post['enrollment']);
        $enrollment_date = @Auth::safe_data($post['enrollment_date']);
        $class = @Auth::safe_data($post['class']) ?? "";

        $sql = "update users set enrollment_status =:enrollment, enrollment_date =CAST(:date AS DATETIME)";
        $emailer = true;
        if (strlen($class) > 0) {
            $sql .= ", current_class = '$class'";

            $this->db->query("select fullname, current_class from users where email=:email");
            $this->db->bind(":email", $email);
            $res = $this->db->single();
            $emailer = $res->current_class == $class;
        }
        $sql .= " where email=:email";
        $this->db->query($sql);
        $this->db->bind(":email", $email);
        $this->db->bind(":enrollment", $enrollment);
        $this->db->bind(":date", $enrollment_date);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $this->db->query("delete from test_score where user_id=:email");
            $this->db->bind(":email", $email);
            $this->db->execute();

            if (!$emailer) {
                Helpers::send_enroll_email($res->fullname, $email, $class);
            }
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
    private function getAverageScore($id = "")
    {
        $id = $id == "" ? $_SESSION[APP]->email : $id;
        $this->db->query("select current_class from users where email=:email");
        $this->db->bind(":email", $id);
        $current_class = $this->db->single()->current_class;


        $this->db->query("
        select 
            avg(test_score.score) as average 
        from test_score
        join add_test on 
            add_test.test_id = test_score.test_id
        where 
            test_score.user_id=:id and
            add_test.class = '$current_class'
            ");
        $this->db->bind(":id", $id);
        return $this->db->single()->average;
    }

    private function getRemark($score)
    {
        $remarks = REMARK;
        krsort($remarks);
        // Find the appropriate remark for the given score
        foreach ($remarks as $threshold => $remark) {
            if ($score >= $threshold) {
                return $remark;
                break;
            }
        }
        return "";
    }
    function getReport($id, $score = "")
    {
        $score = $score == "" ? $this->getAverageScore($id) : $score;
        $user = $this->getUser($id);


        $this->db->query("SELECT count(id) as total from add_test where class=:class");
        $this->db->bind(":class", $user->current_class);
        $total_class_test = $this->db->single()->total;

        $this->db->query("
        SELECT 
            count(test_score.id) as total 
        FROM test_score 
        LEFT JOIN add_test on
            add_test.test_id = test_score.test_id
        where 
            add_test.class=:class and test_score.user_id =:user_id
        ");
        $this->db->bind(":class", $user->current_class);
        $this->db->bind(":user_id", $id);
        $total_attempted = $this->db->single()->total;

        $remark = $this->getRemark($score);
        $remark = str_replace("{{class}}", CLASSESS[$user->current_class], $remark);

        return ['remark' => $remark, 'average' => $score, 'total_test' => $total_class_test, 'attempted' => $total_attempted];
    }
    function getClassIds($class)
    {
        $this->db->query("
        SELECT 
            email as id 
        FROM users 
        where 
            current_class = :class
        ");
        $this->db->bind(":class", $class);
        return $this->db->resultSet();
    }
    function send_report_email($ids)
    {
        foreach ($ids as $i => $id) {
            $user = $this->getUser($id->id);
            $report = $this->getReport($id->id);
            Helpers::send_report_email(
                [
                    'fullname' => $user->fullname,
                    'email' => $user->email,
                    'current_class' => $user->current_class,
                    'session' => SESSION,
                    'pass_mark' => PASS_MARK,
                    'report' => $report

                ]
            );
        }
        return (object)['state' => 1, 'message' => 'Report sent successfully.'];
    }
    function unregisterUser($post)
    {
        $email = @Auth::safe_data($post['email']);

        $sql = "update users set enrollment_status =0, enrollment_date ='0000-00-00 00:00:00', current_class=''  where email=:email;";
        // Delete submitted test
        $sql .= "delete from test_submit where user_id=:email;";
        // Delete test score
        $sql .= "delete from test_score where user_id=:email;";
        $this->db->query($sql);
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
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
