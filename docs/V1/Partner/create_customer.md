Création d'un client
=====================================================================

** Pré requis **
_Avoir une clé partenaire (api\_key), fourni par nos services_


Vous avez un client qui possède un compte sur votre site et vous souhaitez le relier à ScoringLine pour créer des questionnaires, 3 cas apparaissent.

# Client non existant sur ScoringLine

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


# Client créé par vos services et déjà authentifié

Vous avez, normalement, déjà en votre possession la clé entreprise "company_key" et la clé d'utilisateur "user_key" pour effectuer les interactions avec l'API ScoringLine


# Client existant sur ScoringLine, mais non authentifié par vos services

A venir


