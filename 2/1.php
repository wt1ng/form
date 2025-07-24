<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหารายชื่อนักเรียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0">🔍 ค้นหารายชื่อนักเรียนห้อง 609</h1>
                    </div>
                    <div class="card-body">
                        <form action="search.php" method="GET">
                            <div class="mb-3">
                                <label for="search_keyword" class="form-label"><b>ค้นหาจากชื่อ, เลขที่, หรือเลขประจำตัว</b></label>
                                <input type="text" class="form-control" id="search_keyword" name="keyword" placeholder="กรอกคำค้นหา...">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
z
