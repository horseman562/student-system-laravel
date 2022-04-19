<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div style="width: 900px;" class="container max-w-full mx-auto pt-3">
        <h1 class="text-4xl font-bold mb-4">My Blog</h1>

        <a href="/posts/create" class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow my-4">Add Post</a>


        <?php foreach ($posts as $post) { ?>
            <article class="mb-4">

                <a href="/posts/<?php echo $post->id; ?>/edit" class="text-xl font-bold text-gray-900"><?php echo $post->title ?></a>
                <p class="text-md text-gray-600"><?php echo $post->content ?></p>
            </article>
        <?php } ?>





    </div>



    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>