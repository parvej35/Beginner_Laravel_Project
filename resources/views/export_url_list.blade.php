<!DOCTYPE html>
<html>
<head>
    <title>URL List</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
</head>
<body>
    <h2>URL LIST :</h2> <hr>

    <table class="table table-bordered" style="font-size: 13px;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Original URL</th>
                <th scope="col">Tiny URL</th>
                <th scope="col">Inserted On</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($shortenedUrlList as $user) {
                    echo "<tr><th scope='row'>".$user->id."</th><td>".$user->original_url."</td><td>".$user->short_url."</td><td>".$user->created_at."</td></tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
