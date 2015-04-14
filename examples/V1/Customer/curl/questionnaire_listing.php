<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <h1>Nos postes</h1>
    <?php
    // INIT CURL
    $ch = curl_init();
    // CONFIGURED options
    $optArray = array(
        CURLOPT_URL => 'http://api.scoringline.com/api-saas/v1/customer/questionnaires?api_key=yourapikey',
        CURLOPT_RETURNTRANSFER => true
    );
    // PASSED params
    curl_setopt_array($ch, $optArray);
    // GET results
    $result = json_decode(curl_exec($ch));
    // CLOSE curl
    curl_close ($ch)
    ?>
    <ul>
        <?php foreach ($result->questionnaires as $r) { ?>
            <li style="border-bottom: 1px solid lightgray;">
                <h2><?php echo $r->name; ?></h2>
                <?php if ($r->localization) { ?>
                    <p>
                        <strong>Localisation :</strong> <?php echo $r->localization; ?>
                    </p>
                <?php } ?>
                <p>
                    <a href="http://fr.scoringline.com/questionnaire/<?php echo $r->slug ?>/login">Postuler à l'offre</a>
                </p>
                <p>
                    <?php echo $r->job_offer; ?>
                </p>
                <p>
                    <a href="http://fr.scoringline.com/questionnaire/<?php echo $r->slug ?>/login">Postuler à l'offre</a>
                </p>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
