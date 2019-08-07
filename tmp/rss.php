<?php header("Content-Type: text/xml");?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>';?>
<rss version="2.0">
    <channel>
        <title>Aliens Abducted Me - Newsfeed</title>
        <link>http://localhost/Projects/headfirstkonyv9%20rss/</link>
        <description>Alien abduction reports from around the world courtesy of Owen and his abducted do Fang</description>
        <lang>en-us</lang>

        <?php
        require_once 'kapcs.php';
        $kapcs = mysqli_connect(HOST, USER, PW, AB);
        if (!$kapcs) {
            die(mysqli_connect_error());
        }
        mysqli_query($kapcs, "SET NAMES utf8");
        $query = "SELECT * FROM aliens_abduction ORDER BY date DESC";
        $result = mysqli_query($kapcs, $query);
        while ($row = mysqli_fetch_array($result)) {
            $date=date(DATE_RFC822, strtotime($row[10]))
            ?>
            <item>
                <title><?php echo $row[0] . " " . $row[1] . " - " . substr($row[5], 0, 10); ?></title>
                <link>http://localhost/Projects/headfirstkonyv9%20rss/tmp/others.php</link>
                <pupDate><?php echo $date; ?></pupDate>
                <description><?php echo $row[6]; ?></description>
            </item>
            <?php
        }
        ?>
    </channel>
</rss>