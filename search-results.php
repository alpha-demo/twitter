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
        <h1>A L P H A + D E M O</h1>
        <h2>Technical Test Monalyse</h2>
        <h3>Search Twitter Posts by Keywords</h3>
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

// OAuth Tokens and Keys
$arrSettings = array(
    'oauth_access_token'        => "1106145334475005953-TD9aqQLl7ndKuqqrGMNwuvN4VL5U39",
    'oauth_access_token_secret' => "jHEPOT418ChdVunXaTtLDscNHepcGkgXw1Whhrg5Ji7Dy",
    'consumer_key'              => "KTWsb6TveGgDz3ua7oW9PGkpt",
    'consumer_secret'           => "R9QIEFo0xtSyYgzfaFk6lNQZSEXBQLTDTKLg3eC2CzfBs6PMzd"
);

// Defining the Twitter API Search Url
$strUrl = 'https://api.twitter.com/1.1/search/tweets.json';
$strSearchParams = '?'
    // Keywords
    . (isset($_POST["q"]) ? "q=".htmlspecialchars($_POST["q"]) : '' )
    // Language
    . (isset($_POST["lang"]) ? "&lang=".htmlspecialchars($_POST["lang"]) : '' )
    // Language
    . (isset($_POST["result_type"]) ? "&result_type=".htmlspecialchars($_POST["result_type"]) : '' )
;
$strRequestMethod = 'GET';

// Using the TwitterAPIExchange Library to connect and retrieve tweets from the API Search of Tweeter
$objTwitterAPIExchange = new TwitterAPIExchange($arrSettings);
$jsnData = $objTwitterAPIExchange->setGetfield($strSearchParams)->buildOauth($strUrl, $strRequestMethod)->performRequest();
$objSearchResults = json_decode($jsnData);
$arrObjTweets = (isset($objSearchResults->statuses) ? $objSearchResults->statuses : '');

// Printing a basic simple table results [very simple just for demo purpose]
echo "<div id='div-search-results'>";
    echo "<h3>Search Results</h3>";
    echo "<div id='div-search-table-results'>";
        echo "<table id='table-search-results'>";

            // Headers
            echo "<tr>";
                echo "<th></th>";
                echo "<th>DATE</th>";
                echo "<th>USERNAME</th>";
                echo "<th>T E X T</th>";
            echo "</tr>";

            // Rows of tweets
            if(!empty($arrObjTweets)){
                foreach($arrObjTweets as $key=> $objTweet) {
                    echo"<tr>";
                    echo "<td>".($key+1)."</td>";
                    echo "<td>".substr($objTweet->created_at, 0, -11)."</td>";
                    echo "<td>".$objTweet->user->name."</td>";
                    echo "<td>".$objTweet->text."</td>";
                    echo"</tr>";
                }
            }

        echo "</table>";
    echo "</div>";
    echo '
        <form action="index.html">
           <div id="div-back-button"><input type="submit" value="New Search" class="btn-primary"></div>
        </form>
    ';
echo "</div>";


/* //// ********************* /// ************** // ******* // O // ******* // ************** /// *********************  //// */
?>

</body>

</html>