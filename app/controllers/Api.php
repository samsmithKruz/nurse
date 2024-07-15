<?php
class Api extends Controller
{
    private $studentModel;
    private $adminModel;
    private $mainModel;
    private $data;

    public function __construct()
    {
        $this->studentModel = $this->model('student_');
        $this->adminModel = $this->model('admin_');
        $this->mainModel = $this->model('main_');



        // Check if it is a cross-origin preflight request
        header('Access-Control-Allow-Origin: ' . DOMAIN);
        header('Access-Control-Allow-Methods: GET, POST');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        // header('Content-Type: application/json; charset=utf-8');
        if (isset($_SERVER['HTTP_ORIGIN'])) {

            $origin = $_SERVER['HTTP_ORIGIN'];
            $allowedOrigins = array(DOMAIN); // Add more allowed origins if needed

            if (in_array($origin, $allowedOrigins)) {
                // Allow the request from the specified origin

            } else {
                // Deny the request from other origins
                http_response_code(403); // Forbidden
                $response = [
                    'code' => 403,
                    'status' => false,
                    'error' => 'Forbidden',
                    'message' => 'Forbidden',
                    'origin' => 'constructor',
                    'from' => $origin
                ];
                echo json_encode($response);
                exit;
            }
        }

        $this->data = json_decode(file_get_contents("php://input"), true) ?? [];
    }

    public function validateReferer($url = [])
    {
        if (isset($_SERVER['HTTP_REFERER'])) {

            return in_array($_SERVER['HTTP_REFERER'], $url);
        }
    }
    public function getAllUsers($params)
    {
        $_ = empty($params) ? "" : " AND enrollment_status =" . $params[0];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "SELECT * FROM users where (not (is_admin = 1 or is_admin=2)) $_  ";
        if (!empty($searchValue)) {
            $sql .= " AND (fullname like '%$searchValue%' OR email like '%$searchValue%' OR whatsapp like '%$searchValue%' OR enrollment_date like '%$searchValue%' )";
        }
        if ($orderColumnName != "") {
            $sql .= " order by $orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);

        echo json_encode(array('recordsTotal' => $this->mainModel->getTotalStudents(), 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function getAllStaffs()
    {
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "SELECT * FROM users where is_admin = 1  ";
        if (!empty($searchValue)) {
            $sql .= " AND (fullname like '%$searchValue%' OR email like '%$searchValue%' OR whatsapp like '%$searchValue%'  )";
        }
        if ($orderColumnName != "") {
            $sql .= " order by $orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);

        echo json_encode(array('recordsTotal' => $this->mainModel->getTotalStudents(), 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function getAllUsersByClass()
    {
        $class = Auth::safe_data($_GET['class']);
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "SELECT * FROM users where (not is_admin = 1) AND current_class = '$class'  ";
        if (!empty($searchValue)) {
            $sql .= " AND (fullname like '%$searchValue%' OR email like '%$searchValue%' OR whatsapp like '%$searchValue%' OR enrollment_date like '%$searchValue%' )";
        }
        if ($orderColumnName != "") {
            $sql .= " order by $orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);

        echo json_encode(array('recordsTotal' => $this->mainModel->getTotalStudents(), 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function getUploads()
    {
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "SELECT * FROM file_uploads where (1 = 1)  ";
        if (!empty($searchValue)) {
            $sql .= " AND (filename like '%$searchValue%' OR date like '%$searchValue%' )";
        }
        if ($orderColumnName != "") {
            $sql .= " order by $orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from file_uploads")[0]->total;

        echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function generalLibrary()
    {
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            add_file.id,
            'file' as type,
            file_uploads.filename,
            file_uploads.source 
        FROM add_file 
        LEFT JOIN file_uploads on 
            add_file.file_id = file_uploads.id
        where (add_file.section_type='general_library')  ";
        if (!empty($searchValue)) {
            $sql .= " AND (file_uploads.filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql .= " order by file_uploads.$orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from add_file where section_type='general_library'")[0]->total;


        // Link search 

        $sql2 = "
        SELECT 
            id,
            'link' as type,
            filename,
            filename as source 
        FROM add_link 
        where (section_type='general_library')  ";

        if (!empty($searchValue)) {
            $sql2 .= " AND (filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql2 .= " order by $orderColumnName $orderDirection";
        }
        $sql2 .= " limit $start, $length";
        $data2 = $this->mainModel->getData($sql2);
        $total2 = $this->mainModel->getData("select count(id) as total from add_link where section_type='general_library'")[0]->total;

        $data_ = array_merge($data, $data2);
        $total_ = $total + $total2;

        echo json_encode(array('recordsTotal' => $total_, 'recordsFiltered' => count($data_), "data" => $data_));
        exit();
    }
    public function generalLibrary_()
    {
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            add_file.id,
            'file' as type,
            file_uploads.filename,
            file_uploads.source,
            file_uploads.date
        FROM add_file 
        LEFT JOIN file_uploads on 
            add_file.file_id = file_uploads.id
        where (add_file.section_type='general_library')  ";
        if (!empty($searchValue)) {
            $sql .= " AND (file_uploads.filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql .= " order by file_uploads.$orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from add_file where section_type='general_library'")[0]->total;


        // Link search 

        $sql2 = "
        SELECT 
            id,
            'link' as type,
            filename,
            filename as source, 
            date
        FROM add_link 
        where (section_type='general_library')  ";

        if (!empty($searchValue)) {
            $sql2 .= " AND (filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql2 .= " order by $orderColumnName $orderDirection";
        }
        $sql2 .= " limit $start, $length";
        $data2 = $this->mainModel->getData($sql2);
        $total2 = $this->mainModel->getData("select count(id) as total from add_link where section_type='general_library'")[0]->total;

        $data_ = array_merge($data, $data2);
        $total_ = $total + $total2;

        echo json_encode(array('recordsTotal' => $total_, 'recordsFiltered' => count($data_), "data" => $data_));
        exit();
    }
    public function classNotes($params)
    {
        $_ = $params[0];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            add_file.id,
            'file' as type,
            file_uploads.filename,
            file_uploads.source 
        FROM add_file 
        LEFT JOIN file_uploads on 
            add_file.file_id = file_uploads.id
        where (add_file.section_type='$_')  ";
        if (!empty($searchValue)) {
            $sql .= " AND (file_uploads.filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql .= " order by file_uploads.$orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from add_file where section_type='general_library'")[0]->total;


        // Link search 

        $sql2 = "
        SELECT 
            id,
            'link' as type,
            filename,
            filename as source 
        FROM add_link 
        where (section_type='$_')  ";

        if (!empty($searchValue)) {
            $sql2 .= " AND (filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql2 .= " order by $orderColumnName $orderDirection";
        }
        $sql2 .= " limit $start, $length";
        $data2 = $this->mainModel->getData($sql2);
        $total2 = $this->mainModel->getData("select count(id) as total from add_link where section_type='general_library'")[0]->total;

        $data_ = array_merge($data, $data2);
        $total_ = $total + $total2;

        echo json_encode(array('recordsTotal' => $total_, 'recordsFiltered' => count($data_), "data" => $data_));
        exit();
    }
    public function classNotes_($params)
    {
        $_ = $params[0];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            add_file.id,
            file_uploads.filename,
            file_uploads.date,
            file_uploads.source 
        FROM add_file 
        LEFT JOIN file_uploads on 
            add_file.file_id = file_uploads.id
        where (add_file.section_type='$_')  ";
        if (!empty($searchValue)) {
            $sql .= " AND (file_uploads.filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql .= " order by file_uploads.$orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from add_file where section_type='general_library'")[0]->total;

        echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function timetable($params)
    {
        $_ = $params[0];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            add_timetable.id,
            'file' as type,
            file_uploads.filename,
            file_uploads.source 
        FROM add_timetable 
        LEFT JOIN file_uploads on 
            add_timetable.file_id = file_uploads.id
        where (add_timetable.section_type='$_')  ";
        if (!empty($searchValue)) {
            $sql .= " AND (file_uploads.filename like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql .= " order by file_uploads.$orderColumnName $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from add_timetable where section_type='$_'")[0]->total;


        echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function uploadedTests()
    {
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            new_test.*,
            count(new_test_questions.question_id) as questions
        FROM new_test
        LEFT JOIN new_test_questions on
            new_test_questions.test_id = new_test.id
        WHERE (1=1) ";
        if (!empty($searchValue)) {
            $sql .= " AND (new_test.name like '%$searchValue%') ";
        }
        $sql .= " GROUP BY new_test.id ";
        if ($orderColumnName != "") {
            $sql .= " order by new_test.name $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from new_test ")[0]->total;


        echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function test($params)
    {
        $_ = empty($params) ? "" : " AND class ='" . $params[0] . "'";
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            add_test.*,
            test.name
        FROM add_test
        LEFT JOIN test on
            test.id = add_test.test_id
        WHERE (1=1) $_ ";
        if (!empty($searchValue)) {
            $sql .= " AND (test.name like '%$searchValue%') ";
        }
        // $sql .= " GROUP BY add_test.id ";
        if ($orderColumnName != "") {
            $sql .= " order by test.name $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from add_test where (1=1) $_ ")[0]->total;


        echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function student_test($params)
    {
        $user_id = $_SESSION[APP]->email;
        $_ = $params[0];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            t.name,
            t.id,
            ts.score
        FROM 
            users u
        JOIN 
            add_test at ON 
            u.current_class = at.class
        JOIN
            test t ON
            at.test_id = t.id
        LEFT JOIN
            test_score ts ON 
            u.email = ts.user_id AND t.id = ts.test_id
        WHERE
            at.status = 1 AND u.email = '$user_id'
            
        ";
        if (!empty($searchValue)) {
            $sql .= " AND (t.name like '%$searchValue%') ";
        }
        if ($orderColumnName != "") {
            $sql .= " order by t.name $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from add_test where class= '$_' ")[0]->total;


        echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
    public function test_scores()
    {
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];
        $orderColumnIndex = @$_POST['order'][0]['column'];
        $orderColumnName = @$_POST['columns'][$orderColumnIndex]['data'];
        $orderDirection = @$_POST['order'][0]['dir'];

        $sql = "
        SELECT 
            test_score.*,
            users.fullname
        FROM test_score
        LEFT JOIN users on
            test_score.user_id = users.email
        WHERE (1=1)  ";
        if (!empty(Auth::safe_data($_GET['class']))) {
            $sql .= " AND (users.current_class = '$searchValue') ";
        }
        if (!empty($searchValue)) {
            $sql .= " AND (users.fullname like '%$searchValue%') ";
        }
        // $sql .= " GROUP BY add_test.id ";
        if ($orderColumnName != "") {
            $sql .= " order by users.fullname $orderDirection";
        }
        $sql .= " limit $start, $length";
        $data = $this->mainModel->getData($sql);
        $total = $this->mainModel->getData("select count(id) as total from test_score ")[0]->total;


        echo json_encode(array('recordsTotal' => $total, 'recordsFiltered' => count($data), "data" => $data));
        exit();
    }
}
