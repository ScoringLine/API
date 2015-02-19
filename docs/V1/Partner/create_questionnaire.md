Création d'un questionnaire
=====================================================================

**Attention!! toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémentée, veuillez utiliser une url de la forme /api-saas/v1/**

**Pré requis**

- _Avoir une clé partenaire (api\_key), fourni par nos services_

- _Avoir une clé entreprise (company\_key), obtenu lors de la création du client_

- _Avoir une clé utilisateur (user\_key), obtenu lors de la création du client_

# Cas pratique

Vous devez créer un questionnaire pour un "Chef de projet", ce questionnaire devra contenir une question CV qui autorise les documents de type (PDF, doc, txt) et d'un temps d'arrêt avec un déblocage manuel.

Vous devez appelez cette URL

```
POST /api-saas/test/v1/create-customer?api_key=yourapikey&company_key=companykey&user_key=userkey
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

Le script retournera un code 200 sous la forme de 

{
    questionnaireId: "Id du questionnaire à conserver"
}

# Création des éléments

## Type des éléments

- "description"
- "break"
- "open_question"
- "choice"
- "media"
- "webcam"

## Options des éléments

### Options communes
"name" : Nom de l'élément

"text_description" : Texte complémentaire au nom

### [break]
"send\_mail\_option": Au bout de combien de temps doit être envoyer l'email de déblocage

"text_description": Texte qui s'affiche lorsque le candidat atteint le temps d'arrêt

"mail_acceptation": Contenu de l'email de déblocage

### [media]
"isResume": Si l'élément recherché est un CV

"doc_type": Type de document autorisé

