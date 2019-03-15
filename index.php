<!DOCTYPE html>
<html lang="en">
<!--
Enterprise	MONALYSE
Summary		MONALYSE + TechnicalTestMonalyse
@author 	Alejandro D. Bakker Antezana.
@since		Thursday, 14/03/2019
-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>MONALYSE + TechnicalTestMonalyse</title>
</head>

<body>
<div id="div-title">
    <h1>A L P H A   +   D E M O</h1>
    <h2>Technical Test Monalyse</h2>
    <h3>Search Twitter Posts by Keywords</h3>
</div>
<div id="div-form">
    <form action="/action_page.php">
        <div id="div-form-row1">
            <label for="q">Search:</label>
            <input type="text" id="q" placeholder="Write any search terms like: Nasa news" size=70 maxlength="210">
            <label for="lang">Language:</label>
            <select>
                <option value=af>Afrikaans</option>
                <option value=sq>Albanian</option>
                <option value=am>Amharic</option>
                <option value=ar>Arabic</option>
                <option value=hy>Armenian</option>
                <option value=az>Azerbaijani</option>
                <option value=eu>Basque</option>
                <option value=be>Belarusian</option>
                <option value=bn>Bengali</option>
                <option value=bs>Bosnian</option>
                <option value=bg>Bulgarian</option>
                <option value=ca>Catalan</option>
                <option value=ceb>Cebuano</option>
                <option value=ny>Chichewa</option>
                <option value=zh-CN>Chinese</option>
                <option value=co>Corsican</option>
                <option value=hr>Croatian</option>
                <option value=cs>Czech</option>
                <option value=da>Danish</option>
                <option value=nl selected="selected">Dutch</option>
                <option value=en>English</option>
                <option value=eo>Esperanto</option>
                <option value=et>Estonian</option>
                <option value=tl>Filipino</option>
                <option value=fi>Finnish</option>
                <option value=fr>French</option>
                <option value=fy>Frisian</option>
                <option value=gl>Galician</option>
                <option value=ka>Georgian</option>
                <option value=de>German</option>
                <option value=el>Greek</option>
                <option value=gu>Gujarati</option>
                <option value=ht>Haitian Creole</option>
                <option value=ha>Hausa</option>
                <option value=haw>Hawaiian</option>
                <option value=iw>Hebrew</option>
                <option value=hi>Hindi</option>
                <option value=hmn>Hmong</option>
                <option value=hu>Hungarian</option>
                <option value=is>Icelandic</option>
                <option value=ig>Igbo</option>
                <option value=id>Indonesian</option>
                <option value=ga>Irish</option>
                <option value=it>Italian</option>
                <option value=ja>Japanese</option>
                <option value=jw>Javanese</option>
                <option value=kn>Kannada</option>
                <option value=kk>Kazakh</option>
                <option value=km>Khmer</option>
                <option value=ko>Korean</option>
                <option value=ku>Kurdish (Kurmanji)</option>
                <option value=ky>Kyrgyz</option>
                <option value=lo>Lao</option>
                <option value=la>Latin</option>
                <option value=lv>Latvian</option>
                <option value=lt>Lithuanian</option>
                <option value=lb>Luxembourgish</option>
                <option value=mk>Macedonian</option>
                <option value=mg>Malagasy</option>
                <option value=ms>Malay</option>
                <option value=ml>Malayalam</option>
                <option value=mt>Maltese</option>
                <option value=mi>Maori</option>
                <option value=mr>Marathi</option>
                <option value=mn>Mongolian</option>
                <option value=my>Myanmar (Burmese)</option>
                <option value=ne>Nepali</option>
                <option value=no>Norwegian</option>
                <option value=ps>Pashto</option>
                <option value=fa>Persian</option>
                <option value=pl>Polish</option>
                <option value=pt>Portuguese</option>
                <option value=pa>Punjabi</option>
                <option value=ro>Romanian</option>
                <option value=ru>Russian</option>
                <option value=sm>Samoan</option>
                <option value=gd>Scots Gaelic</option>
                <option value=sr>Serbian</option>
                <option value=st>Sesotho</option>
                <option value=sn>Shona</option>
                <option value=sd>Sindhi</option>
                <option value=si>Sinhala</option>
                <option value=sk>Slovak</option>
                <option value=sl>Slovenian</option>
                <option value=so>Somali</option>
                <option value=es>Spanish</option>
                <option value=su>Sundanese</option>
                <option value=sw>Swahili</option>
                <option value=sv>Swedish</option>
                <option value=tg>Tajik</option>
                <option value=ta>Tamil</option>
                <option value=te>Telugu</option>
                <option value=th>Thai</option>
                <option value=tr>Turkish</option>
                <option value=uk>Ukrainian</option>
                <option value=ur>Urdu</option>
                <option value=uz>Uzbek</option>
                <option value=vi>Vietnamese</option>
                <option value=cy>Welsh</option>
                <option value=xh>Xhosa</option>
                <option value=yi>Yiddish</option>
                <option value=yo>Yoruba</option>
                <option value=zu>Zulu</option>
            </select>
        </div>
        <div id="div-form-row2">
            <fieldset>
                <legend>Recent/Popularity:</legend>
                <input type="radio" name="result_type" value="recent"> Recent<br>
                <input type="radio" name="result_type" value="popular"> Popular<br>
            </fieldset>
            <input type="submit" value="Search">
        </div>
        <div id="div-form-row3">
            <p>Description: Please write some keywords like for example: Nasa news,
                then select your favorite Language, and finally filter your tweets results
                by either the most recent or the most popular.</p>
        </div>
    </form>
</div>


<?php

/* //// ********************* /// ************** // ******* /              M O N A L Y S E              / ******* // ************** /// *********************  //// */

/**
 * Enterprise   MONALYSE
 * Summary      MONALYSE + TechnicalTestMonalyse
 * @author      Alejandro D. Bakker Antezana.
 * @since       Thursday, 14/03/2019
 * @version     1.0.0 / PHP Version: 7.3.1
 */


require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token'        => "1106145334475005953-TD9aqQLl7ndKuqqrGMNwuvN4VL5U39",
    'oauth_access_token_secret' => "jHEPOT418ChdVunXaTtLDscNHepcGkgXw1Whhrg5Ji7Dy",
    'consumer_key'              => "KTWsb6TveGgDz3ua7oW9PGkpt",
    'consumer_secret'           => "R9QIEFo0xtSyYgzfaFk6lNQZSEXBQLTDTKLg3eC2CzfBs6PMzd"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=nasa&result_type=popular';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);

$data = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

echo "<pre>";
print_r(json_decode($data));
echo "</pre>";

/*
$json_string = json_encode(json_decode($data), JSON_PRETTY_PRINT);


echo $json_string;

    // "<pre>" . "" . "</pre>";



*/









/* //// ********************* /// ************** // ******* // O // ******* // ************** /// *********************  //// */
?>

<script type="application/javascript">
    // ..
</script>
</body>

</html>












