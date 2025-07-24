<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"] ?? "";
    $lastname = $_POST["lastname"] ?? "";
    $class = $_POST["class"] ?? "";
    $student_id = $_POST["student_id"] ?? "";
    $program = $_POST["program"] ?? "";
    $gender = $_POST["gender"] ?? "";
    
    $errors = [];
    
    if (empty($firstname)) {
        $errors[] = "กรุณากรอกชื่อ";
    }
    
    if (empty($lastname)) {
        $errors[] = "กรุณากรอกนามสกุล";
    }
    
    if (empty($class)) {
        $errors[] = "กรุณากรอกชั้น";
    }
    
    if (empty($student_id)) {
        $errors[] = "กรุณากรอกเลขที่";
    }
    
    if (empty($program)) {
        $errors[] = "กรุณาเลือกแผนการเรียน";
    }
    
    if (empty($gender)) {
        $errors[] = "กรุณาเลือกเพศ";
    }
    
    if (!empty($student_id) && !is_numeric($student_id)) {
        $errors[] = "เลขที่ต้องเป็นตัวเลขเท่านั้น";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มข้อมูลนักเรียน</title>
    <style>
        body {
            font-family: 'Sarabun', Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }
        
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }
        
        .radio-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        input[type="radio"] {
            margin: 0;
        }
        
        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        
        .submit-btn:hover {
            background-color: #0056b3;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .result-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        .result-table td:first-child {
            font-weight: bold;
            width: 30%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ฟอร์มข้อมูลนักเรียน</h1>
        
        <?php
        if (isset($errors) && !empty($errors)) {
            echo '<div class="error-message">';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
       
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
            echo '<div class="success-message">';
            echo '<h3>ข้อมูลที่ส่งมาเรียบร้อยแล้ว</h3>';
            echo '<table class="result-table">';
            echo '<tr><td>ชื่อ:</td><td>' . htmlspecialchars($firstname) . '</td></tr>';
            echo '<tr><td>นามสกุล:</td><td>' . htmlspecialchars($lastname) . '</td></tr>';
            echo '<tr><td>ชั้น:</td><td>' . htmlspecialchars($class) . '</td></tr>';
            echo '<tr><td>เลขที่:</td><td>' . htmlspecialchars($student_id) . '</td></tr>';
            echo '<tr><td>แผนการเรียน:</td><td>' . htmlspecialchars($program) . '</td></tr>';
            echo '<tr><td>เพศ:</td><td>' . htmlspecialchars($gender) . '</td></tr>';
            echo '</table>';
            echo '</div>';
        }
        ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="firstname">ชื่อ:</label>
                <input type="text" id="firstname" name="firstname" 
                       value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>"
                       placeholder="กรอกชื่อ">
            </div>
            
            <div class="form-group">
                <label for="lastname">นามสกุล:</label>
                <input type="text" id="lastname" name="lastname" 
                       value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>"
                       placeholder="กรอกนามสกุล">
            </div>
            
            <div class="form-group">
                <label for="class">ชั้น:</label>
                <input type="text" id="class" name="class" 
                       value="<?php echo isset($_POST['class']) ? htmlspecialchars($_POST['class']) : ''; ?>"
                       placeholder="เช่น ม.6/1">
            </div>
            
            <div class="form-group">
                <label for="student_id">เลขที่:</label>
                <input type="number" id="student_id" name="student_id" 
                       value="<?php echo isset($_POST['student_id']) ? htmlspecialchars($_POST['student_id']) : ''; ?>"
                       placeholder="กรอกเลขที่">
            </div>
            
            <div class="form-group">
                <label for="program">แผนการเรียน:</label>
                <select id="program" name="program">
                    <option value="">-- เลือกแผนการเรียน --</option>
                    <option value="เทคโนโลยีวิศวกรรมศาสตร์" 
                            <?php echo (isset($_POST['program']) && $_POST['program'] == 'เทคโนโลยีวิศวกรรมศาสตร์') ? 'selected' : ''; ?>>
                        เทคโนโลยีวิศวกรรมศาสตร์
                    </option>
                    <option value="ศิลปศาสตร์" 
                            <?php echo (isset($_POST['program']) && $_POST['program'] == 'ศิลปศาสตร์') ? 'selected' : ''; ?>>
                        ศิลปศาสตร์
                    </option>
                    <option value="ภาษาอังกฤษ" 
                            <?php echo (isset($_POST['program']) && $_POST['program'] == 'ภาษาอังกฤษ') ? 'selected' : ''; ?>>
                        ภาษาอังกฤษ
                    </option>
                    <option value="สถาปัตยกรรม" 
                            <?php echo (isset($_POST['program']) && $_POST['program'] == 'สถาปัตยกรรม') ? 'selected' : ''; ?>>
                        สถาปัตยกรรม
                    </option>
                </select>
            </div>
            
            <div class="form-group">
                <label>เพศ:</label>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="male" name="gender" value="ชาย" 
                               <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'ชาย') ? 'checked' : ''; ?>>
                        <label for="male">ชาย</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="female" name="gender" value="หญิง" 
                               <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'หญิง') ? 'checked' : ''; ?>>
                        <label for="female">หญิง</label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="submit-btn">ส่งข้อมูล</button>
        </form>
    </div>
</body>
</html>