<?php

// mendapatkan file json
$file = file_get_contents('json/todolist.json');
//ubah ke string array
$list = json_decode($file, true);

if (isset($_POST['submit'])) {
    $ListData = $_POST['list'];
    $id = $_POST['id'];

    if ($ListData == null) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Maaf anda harus mengisi form yang tersedia!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        $list[] = [
            'key' => 'keyTodo',
            'id' => $id,
            'listTodo' => $ListData
        ];

        // ubah ke json
        $jsonFile = json_encode($list, JSON_PRETTY_PRINT);
        // simpan ke dalam json
        $data = file_put_contents('json/todolist.json', $jsonFile);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Todo List</title>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="d-flex flex-column">
            <h1 class="fw-bold">Web TodoList Sederhana</h1>
            <div class="d-flex justify-content-between w-100">
                <table class="table ">
                    <tbody>
                        <?php $number = 1; ?>
                        <?php foreach ($list as $value) : ?>
                            <tr>
                                <td>
                                    <p class="text-capitalize"><?= $value['listTodo']; ?> </p>
                                </td>
                                <td><a href="models/hapus.php?id=<?= $value['id']; ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php $number++;  ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-column gap-1">
                <form action="" method="post">
                    <input type="hidden" name="id" class="form-control" value="<?= $number; ?>">
                    <label for="list" class="text-capitalize fw-bold mb-2">List</label>
                    <input type="text" name="list" class="form-control" placeholder="Typing List....">
                    <button name="submit" type="submit" class="btn fw-bold text-uppercase btn-sm mt-2 btn-primary">Add List</button>
                    <a href="models/clear.php?clear" class="btn fw-bold text-uppercase btn-sm mt-2 btn-danger">Clear</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>