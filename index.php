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
        * {
            box-sizing: border-box;
        }

        body {
            background: #fff;
            font-family: 'Roboto', sans-serif;
        }

        .header {
            position: relative;
            padding: 20px;
            margin: 50px auto;
            text-align: center;

            &:after {
                content: "";
                position: absolute;
                display: block;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                height: 4px;
                width: 25%;
                background: #000;
            }

            h1 {
                position: relative;
                padding: 5px;
            }
        }

        .container {
            margin: 0 auto;
        }

        .item {
            border-radius: 5px;
            padding: 1em;
            margin: 0 auto 1em auto;
            overflow: hidden;
            z-index: 1;
            text-decoration: none;
            transition: all 120ms ease;

            h3 {
                color: #000;
            }

            p {
                color: #5b5b5b;
            }

            &:before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #f9f9f9;
                z-index: -1;
                transform: scale(0);
                opacity: 0;
                transition: all 100ms ease;
            }

            &:hover {
                opacity: 0.75;
            }

            &:hover::before {
                transform: scale(1);
                opacity: 1;
            }

            img {
                width: 100%;
                height: auto;
                display: block;
            }
        }

        .grid-sizer,
        .item {
            width: 30%;
        }

        @media only screen and (min-width: 480px) and (max-width: 727px) {

            .grid-sizer,
            .item {
                width: 33%;
            }
        }

        @media only screen and (max-width: 479px) {

            grid-sizer,
            .item {
                width: 50%;
            }
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            }


        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }

        .mainContainer {
            padding: 2px 16px;
            background : white;
            }
    </style>
</head>

<body>

        <div class="container">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
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
                            echo '<div class="card"><a class="item" href="https://pinkvilla.com'. $row["path"] . '">
                            <img src="'. $row["imageUrl"] . '">
                            <div class="mainContainer">
                            <h4><b>'. $row["title"] . '</b></h4>
                            <p>'. $row["viewCount"] . '</p>
                            </div></a>
                            </div>
';
                }
                ?>
        
        </div>
        <script>
        jQuery(window).on('load', function () {
            $('.container').masonry({
                columnWidth: '.grid-sizer',
                gutter: 30,
                itemSelector: '.item',
                percentPosition: 'true',
                fitWidth: true,
            });
        });
    </script>
</body>

</html>