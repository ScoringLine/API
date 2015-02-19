Comment interagir avec un client via l'API
=====================================================================

En tant que partenaire, vous allez effectuer des actions pour le compte de clients sur ScoringLine.

# Création d'un client
----------

# Pré requis
Avoir une clé partenaire (api_key), fourni par nos services


Vous avez un client qui possède un compte sur votre site et vous souhaitez le relier à ScoringLine pour créer des questionnaires, 3 cas apparaissent.

### Client non existant sur ScoringLine

Vous devez appelez cette URL

```
POST /api-saas/v1/create-customer?api_key=yourapikey
```

Avec les paramètres, ci-dessous.


```json
{
    "company": {
        "name":"Nom de l'entreprise",
        "phone_number":"Numéro de téléphone de l'entreprise"
    },
    "user": {
        "email":"Email du contact",
        "lastname":"Nom du contact",
        "firstname":"prénom du contact",
        "password":"Mot de passe pour accéder à notre compte (Optionnel auto généré si non fourni)"
    }
}
```

Si toutes les informations sont fournis vous devriez obtenir cette réponse (code '200')


```json
{
    "company_key": "clé de l'entreprise",
    "user_key": "clé de l'utilisateur"
}
```

> Conservez ces 2 clés elles seront importantes pour vos futures interactions avec l'API ScoringLine


### Client créé par vos services et déjà authentifié

Vous avez, normalement, déjà en votre possession la clé entreprise "company_key" et la clé d'utilisateur "user_key" pour effectuer les interactions avec l'API ScoringLine


### Client existant sur ScoringLine, mais non authentifié par vos services

A venir



Création d'un questionnaire
----------

# Pré requis
Avoir une clé partenaire (api_key), fourni par nos services
Avoir une clé entreprise (company_key), obtenu lors de la création du client
Avoir une clé utilisateur (user_key), obtenu lors de la création du client

### Cas pratique

Vous devez créer un questionnaire pour un "Chef de projet", ce questionnaire devra contenir une question CV qui autorise les documents de type (PDF, doc, txt) et d'un temps d'arrêt avec un déblocage manuel.

Vous devez appelez cette URL

```
POST /api-saas/v1/create-customer?api_key=yourapikey&company_key=companykey&user_key=userkey
```

Avec les paramètres, ci-dessous.


```json
{
    "base": {
        "name":"Chef de projet",
        "text_introduction":"text",
        "text_presentation":"text"
    },
    "elements": [
        {
            "type":"media",
            "data":{
                "name":"T\u00e9l\u00e9chargez votre CV",
                "isResume":1,
                "doc_type":["doc","pdf","txt"]
            }
        },
        {
            "type":"break",
            "data":{
                "name":"F\u00e9licitations",
                "send_mail_option":"manual",
                "text_description":"text",
                "mail_acceptation":"text"
            }
        }
    ]
}
```

### Type des éléments

"description"
"break"
"open_question"
"choice"
"media"
"webcam"

## Options communes
"name" : Nom de l'élément
"text_description" : Texte complémentaire au nom

# [break]
"send_mail_option": Au bout de combien de temps doit être envoyer l'email de déblocage
"text_description": Texte qui s'affiche lorsque le candidat atteint le temps d'arrêt
"mail_acceptation": Contenu de l'email de déblocage

# [media]
"isResume": Si l'élément recherché est un CV
"doc_type": Type de document autorisé

