Récupérer les répondants d'un questionnaire
=====================================================================

>**:warning: toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémentée, veuillez utiliser une url de la forme /api-saas/v1/**

**Pré requis**

- _Avoir une clé partenaire (api\_key), fourni par nos services_

- _Avoir une clé entreprise (company\_key), obtenu lors de la création du client_

- _Avoir une clé utilisateur (user\_key), obtenu lors de la création du client_

- _Avoir l'identifiant questionnaire (slug)_

# Requête
**POST** `api-saas/test/v1/partner/questionnaires/{slug}/respondents.json`

# Réponse
`200` - La liste des candidats du questionnaire au format JSON

# Filtres
Il est possible de filtrer les répondants d'un questionnaire selon plusieurs critères.

Les filtres disponibles sont les suivants :
* *status (`String`)* : Le statut du candidat. Example : `accepted`, `unmarked`, `waiting`
* *haveScore (`String`)* : La notation du candidat. Example : `non_scored`, `scored_by_not_us`, `scored`, `scored_by_us`
* *approximateKeyword (`String`)* : Chaîne de caractère recherchée dans le nom et l'adresse mail des candidats.

# Cas pratique

Vous souhaitez récupérer l'ensemble des candidats acceptés du questionnaire *foobar*.

```
POST https://api.scoringline.com/api-saas/test/v1/partner/questionnaires/foobar/respondents.json?api_key=yourapikey&company_key=companykey&user_key=userkey
```

Avec les paramètres, ci-dessous.

Clé              | valeur
-----------------|------------------
filters[status]  | accepted 

Le script retournera un code `200` et l'ensemble des candidats ayant été acceptés.
