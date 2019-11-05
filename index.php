<!DOCTYPE html>
<html>

<head>
    <title>PHP - JSON FEED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src= "https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>

    <style>
                 .masonry {
            column-count: 4;
            column-gap: 1em;
        }

        .item {
            background-color: #eee;
            display: inline-block;
            margin: 0 0 1em;
            width: 100%;
        }
        body {
            font: 1em/1.67 'Open Sans', Arial, Sans-serif;
            margin: 0;
            background: #e9e9e9;
        }

        .wrapper {
            width: 95%;
            margin: 3em auto;
        }

        .masonry {
            margin: 1.5em 0;
            padding: 0;
            -moz-column-gap: 1.5em;
            -webkit-column-gap: 1.5em;
            column-gap: 1.5em;
            font-size: .85em;
        }

        .item {
            display: inline-block;
            background: #fff;
            padding: 1em;
            margin: 0 0 1.5em;
            width: 100%;
            -webkit-transition:1s ease all;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-shadow: 2px 2px 4px 0 #ccc;
        }
        .item img{max-width:100%;}

        @media only screen and (min-width: 400px) {
            .masonry {
                -moz-column-count: 2;
                -webkit-column-count: 2;
                column-count: 2;
            }
        }

        @media only screen and (min-width: 700px) {
            .masonry {
                -moz-column-count: 3;
                -webkit-column-count: 3;
                column-count: 3;
            }
        }

        @media only screen and (min-width: 900px) {
            .masonry {
                -moz-column-count: 4;
                -webkit-column-count: 4;
                column-count: 4;
            }
        }

        @media only screen and (min-width: 1100px) {
            .masonry {
                -moz-column-count: 5;
                -webkit-column-count: 5;
                column-count: 5;
            }
        }

        @media only screen and (min-width: 1280px) {
            .wrapper {
                width: 1260px;
            }
        }
    </style>
</head>

<body>

        <div class="masonry">
                <?php
                        $data = file_get_contents("https://cdn.pinkvilla.com/feed/fashion-section.json");
                        $data = json_decode($data, true);
                        $viewCount = array();
                        foreach ($data as $key => $row)
                        {
                            $viewCount[$key] = $row['viewCount'];
                        }
                        array_multisort($viewCount, SORT_ASC, $data);
                        foreach ($data as $row) {
                            echo '<a class="item" href="https://pinkvilla.com'. $row["path"] . '">
                                    "<img src="'. $row["imageUrl"] .'">
                                    "<p style="margin:10px 0; color:black">
                                        <b>'. $row["title"] . '</b>
                                    </p>
                                </a>';
                }
                ?>
        
        </div>
</body>

</html>