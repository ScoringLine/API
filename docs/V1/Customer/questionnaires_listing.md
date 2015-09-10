Récupération des questionnaires de votre entreprise
=====================================================================

Pré requis
----------

*  *Avoir une clé client (`api_key`), fournie par nos services*


Utilisation
-----------

Vous souhaitez afficher tous vos questionnaires publiés sur votre site Internet et les rediriger vers la connexion.

Vous devez appeler cette URL:

```
GET http://api.scoringline.com/api-saas/v1/customer/questionnaires?api_key={YourApiKey}
```

Vous recevrez en retour une collection de questionnaire

```json
{
  "questionnaires":
    {
      "0": {
        "name": "nom du questionnaire",
        "slug": "identifiant",
        "localization": "Localisation de votre annonce",
        "job_offer": "Récapitulatif de votre annonce"
      },
      "1": {
        "name": "nom du questionnaire",
        "slug": "identifiant",
        "localization": "Localisation de votre annonce",
        "job_offer": "Récapitulatif de votre annonce"
      }
    }
}
```
Le lien à générer pour arriver sur le début de l'entretien est le suivant

``` html
http://fr.scoringline.com/questionnaire/{slug}/login
```
