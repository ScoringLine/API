Récupérer les répondants
=====================================================================

>**:warning: toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémenté, veuillez utiliser une url de la forme /api-saas/v1/**

**Pré requis**

- _Avoir une clé entreprise (api\_key), fourni par nos services_

- _Avoir une clé utilisateur (user\_key), obtenu lors de la création du client_


## Table des matières

1. [Récupérer les répondants d'une entreprise](#récupérer-les-répondants-dune-entreprise)

2. [Récupérer les répondants d'un questionnaire](#récupérer-les-répondants-dun-questionnaire)

3. [Récupérer un répondant d'un questionnaire](#récupérer-un-répondant-dun-questionnaire)


## Récupérer les répondants d'une entreprise

### Requête
**GET** `api-saas/test/v1/customer/respondents.json`

### Paramêtres disponibles
Paramètres | Type    | Description                  | Valeur par défaut | Exemple
-----------|---------|------------------------------|-------------------|---------
page       | integer | Numéro de la page souhaitée  | 1                 | `&page=2`
limit      | integer | Nombre de résultats par page | 50                | `&limit=10`

### Réponse
`200` - La liste des candidats de l'entreprise au format JSON
```json
{
  "items": [
    {
      "questionnaire": {
        "id": "{questionnaireId}",
        "name": "{questionnaireName}",
        "slug": "{questionnaireSlug}",
        "offer_ref": "{questionnaireReference}"
      },
      "score_total_percentage": null,
      "id": "{respondentId}",
      "score_auto": null,
      "score_total": null,
      "main_comment": null,
      "status": "{respondentStatus}",
      "phone_number": "{respondentPhoneNumber}",
      "email": "{respondentEmail}",
      "first_name": "{respondentFirstName}",
      "last_name": "{respondentLastName}",
      "candidate_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/show",
      "custom_status": {
        "id": "{customStatusId}",
        "name": "{customStatusName}",
        "slug": "{customStatusSlug}"
      },
      "synthesis_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/generate/synthesis.pdf"
    }
  ],
  "total_results": "{totalResults}",
  "current_page": "{currentPage}",
  "nextPage": "http://api.scoringline.com/api-saas/test/v1/customer/respondents.json?page={nextPageNumber}&limit={limit}",
  "previousPage": "http://api.scoringline.com/api-saas/test/v1/customer/respondents.json?page={previousPageNumber}&limit={limit}"
}
```

### Description des données
Nom           | Type         | Description
--------------|--------------|---------------------------------------------------------------------------------
items         | object       | Objet représentant un répondant (voir [Objet`items`](#objet-items))
total_results | integer      | Nombre total de répondants paginés
current_page  | string (url) | Numéro de la page courante
nextPage      | string (url) | URL de la page avec les résultats précédents (si le filtre `page` est inférieur à la dernière page)
previousPage  | string (url) | URL de la page avec les résultats précédents (si le filtre `page` est supérieur à 1)


#### Objet `items`
Nom                    | Type         | Description
-----------------------|--------------|---------------------------------------------------
questionnaire          | object       | Objet représentant les informations du questionnaire lié au répondant (voir [Objet`questionnaire`](#objet-questionnaire))
score_total_percentage | integer      | Pourcentage de réussite par rapport au score total
id                     | integer      | Id du répondant
score_auto             | integer      | Scoring automatique
score_total            | integer      | Note total
main_comment           | string       | Commentaire principal du répondant
status                 | integer      | Id du statut (état) du répondant
phone_number           | string       | Numéro de téléphone du répondant
email                  | string       | Email du répondant 
first_name             | string       | Prénom du répondant 
last_name              | string       | Nom du répondant 
candidate_link         | string (url) | Lien vers la fiche du répondant (nécessite d'être authentifié sur l'interface Scoringline)
custom_status          | object       | Objet représentant le statut personnalisé attribué au répondant (voir [Objet`custom_status`](#objet-custom_status))
synthesis_link         | string (url) | Lien vers la synthèse PDF du répondant (nécessite d'être authentifié sur l'interface Scoringline)

#### Objet `questionnaire`
Nom       | Type    | Description
----------|---------|----------------------------------
id        | integer | Id du questionnaire
name      | string  | Nom du questionnaire
slug      | string  | Identifant unique (url friendly)
offer-ref | string  | Référence unique du questionnaire 

#### Objet `custom_status`
Nom  | Type    | Description
-----|---------|----------------------------------
id   | integer | Id du statut personnalisé
name | string  | Nom du statut
slug | string  | Identifant unique (url friendly)


### Cas pratique
Vous souhaitez récupérer la 2e page de la liste des répondants paginée par 2:

```
GET api-saas/test/v1/customer/respondents.json?page=2&limit=2
```

Voici les données retournées:
```json
{
  "items": [
    {
      "questionnaire": {
        "id": 887,
        "name": "Foo Bar",
        "slug": "foo-bar",
        "offer_ref": "FOOBAR001"
      },
      "score_total_percentage": 75,
      "id": 8903,
      "score_auto": 20,
      "score_total": 150.8,
      "main_comment": null,
      "status": 3,
      "phone_number": "+33666666666",
      "email": "r.hendricks@piedpiper.com",
      "first_name": "Richard",
      "last_name": "Hendricks",
      "candidate_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/8903/show",
      "custom_status": {
        "id": 12,
        "name": "A rappeler",
        "slug": "a-rappeler"
      },
      "synthesis_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/8903/generate/synthesis.pdf"
    },
    {
      "questionnaire": {
        "id": 887,
        "name": "Foo Bar",
        "slug": "foo-bar",
        "offer_ref": "FOOBAR001"
      },
      "score_total_percentage": 59,
      "id": 9168,
      "score_auto": 20,
      "score_total": 118.9,
      "main_comment": null,
      "status": 6,
      "phone_number": "+33666666666",
      "email": "b.gilfoyle@piedpiper.com",
      "first_name": "Bertram",
      "last_name": "Gilfoyle",
      "candidate_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/9168/show",
      "custom_status": null,
      "synthesis_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/9168/generate/synthesis.pdf"
    }
  ],
  "total_results": 11,
  "current_page": "2",
  "nextPage": "http://api.scoringline.com/api-saas/test/v1/customer/respondents.json?&page=3",
  "previousPage": "http://api.scoringline.com/api-saas/test/v1/customer/respondents.json&page=1"
}
```


## Récupérer les répondants d'un questionnaire

### Requête
**POST** (ou GET sans filtres)`api-saas/test/v1/customer/questionnaires/{questionnaireSlug}/respondents.json`

### Paramêtres disponibles
Il est possible de filtrer les répondants d'un questionnaire selon plusieurs critères.
Les filtres disponibles  en POST sont les suivants :

Filtres                     | Type                                 | Description                                                                | Exemple 
--------------------------- |--------------------------------------|----------------------------------------------------------------------------|------------
filters[status]             | string                               | Le statut du candidat                                                      | `accepted`, `unmarked`, `waiting`
filters[customStatus]       | integer\|string\|integer[]\|string[] | Les identifiants des statuts personnalisés                                 | `a-rappeler`
filters[haveScore]          | string                               | La notation du candidat                                                    | `non_scored`, `scored_by_not_us`, `scored`, `scored_by_us`
filters[approximateKeyword] | string                               | Chaîne de caractère recherchée dans le nom et l'adresse mail des candidats | `e.bachman@yopmail.com`, `erlich`, `bachman`
filters[createdfrom]        | integer (UNIX timestamp)             | Nouvelles candidatures depuis                                              | 1451602800 
filters[lastUpdatedFrom]    | integer (UNIX timestamp)             | Candidatures mises à jour depuis                                           | 1466066108 

### Réponse
`200` - La liste des candidats du questionnaire au format JSON
`400` - Les données que vous envoyez sont incorrectes (un message d'erreur est fourni)
```json
[
  {
    "score_total_percentage": null,
    "id": "{respondentId}",
    "score_auto": null,
    "score_total": null,
    "main_comment": null,
    "phone_number": "{respondentPhoneNumber}",
    "email": "{respondentEmail}",
    "first_name": "{respondentFirstName}",
    "last_name": "{respondentLastName}",
    "candidate_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/show",
    "custom_status": null,
    "synthesis_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/generate/synthesis.pdf",
    "comments": [
      {
        "author": "{authorName}",
        "author_id": "{authorId}",
        "comment": "{authorComment}"
      }
    ]
  },
  {
    "score_total_percentage": null,
    "id": "{respondentId}",
    "score_auto": null,
    "score_total": null,
    "main_comment": null,
    "phone_number": "{respondentPhoneNumber}",
    "email": "{respondentEmail}",
    "first_name": "{respondentFirstName}",
    "last_name": "{respondentLastName}",
    "candidate_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/show",
    "custom_status": null,
    "synthesis_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/generate/synthesis.pdf",
    "comments": null
  },
  ...
]
```

### Description des données
Nom                    | Type         | Description
-----------------------|--------------|---------------------------------------------------
score_total_percentage | integer      | Pourcentage de réussite par rapport au score total
id                     | integer      | Id du répondant
score_auto             | integer      | Scoring automatique
score_total            | integer      | Note total
main_comment           | string       | Commentaire principal du répondant
status                 | integer      | Statut (état) du répondant
phone_number           | string       | Numéro de téléphone du répondant
email                  | string       | Email du répondant 
first_name             | string       | Prénom du répondant 
last_name              | string       | Nom du répondant 
candidate_link         | string (url) | Lien vers la fiche du répondant (nécessite d'être authentifié sur l'interface Scoringline)
custom_status          | object       | Objet représentant le statut personnalisé attribué au répondant (voir [Objet`custom_status`](#objet-custom_status))
synthesis_link         | string (url) | Lien vers la synthèse PDF du répondant (nécessite d'être authentifié sur l'interface Scoringline)
comments               | object       | Objet représentant les commentaires concernant le répondant (voir [Objet`comments`](#objet-comments))

#### Objet `comments`
comments  | Type    | Description
----------|---------|-----------------------------------------
author    | string  | Prénom et Nom de l'auteur du commentaire
author_id | integer | Id de l'auteur du commentaire
comment   | string  | Commentaire


### Cas pratique

Vous souhaitez récupérer l'ensemble des candidats ayant participé au questionnaire *foobar* en 2016 et ayant été acceptés.

```
POST api-saas/test/v1/customer/questionnaires/foobar/respondents.json
```

Avec les paramètres POST, ci-dessous.

Clé                        | Valeur       
---------------------------|--------------
filters[status]            | `accepted`   
filters[createdfrom]       | `1451602800` 
filters[lastUpdatedFrom]   | `1466066108` 


Le script retournera un code `200` et l'ensemble des candidats ayant particpé au questionnaire *foobar* à partir du 01/01/2016 00:00:00 et ayant été acceptés.

Voici les données retournées:
```json
[
  {
    "score_total_percentage": null,
    "id": 8865,
    "score_auto": 37,
    "score_total": null,
    "main_comment": "Excellent candidat",
    "phone_number": "+33666666666",
    "email": "e.bachman@aviato.com",
    "first_name": "Erlich",
    "last_name": "Bachman",
    "candidate_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/8865/show",
    "custom_status": null,
    "synthesis_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/8865/generate/synthesis.pdf",
    "comments": null
  },
  {
    "score_total_percentage": 75,
    "id": 8903,
    "score_auto": 20,
    "score_total": 150.8,
    "main_comment": null,
    "phone_number": "+33666666666",
    "email": "r.hendricks@piedpiper.com",
    "first_name": "Richard",
    "last_name": "Hendricks",
    "candidate_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/8903/show",
    "custom_status": null,
    "synthesis_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/8903/generate/synthesis.pdf",
    "comments": [
      {
        "author": "Gavin Belson",
        "author_id": 325,
        "comment": "A voir en entretien individuel"
      }
    ]
  },
  {
    "score_total_percentage": 59,
    "id": 9168,
    "score_auto": 20,
    "score_total": 118.9,
    "main_comment": null,
    "phone_number": "+33666666666",
    "email": "b.gilfoyle@piedpiper.com",
    "first_name": "Bertram",
    "last_name": "Gilfoyle",
    "candidate_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/9168/show",
    "custom_status": null,
    "synthesis_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/9168/generate/synthesis.pdf",
    "comments": [
      {
        "author": "Gavin Belson",
        "author_id": 325,
        "comment": "Ne pas rappeler"
      }
    ]
  }
]
```


## Récupérer un répondant d'un questionnaire

### Requête
**GET** `api-saas/test/v1/customer/questionnaires/foobar/respondents/{respondentId}.json`

### Réponse
`200` - Les données d'un candidat du questionnaire au format JSON
```json
{
  "score_total_percentage": null,
  "id": "{respondentId}",
  "score_auto": null,
  "score_total": null,
  "main_comment": null,
  "phone_number": "{respondentPhoneNumber}",
  "email": "{respondentEmail}",
  "first_name": "{respondentFirstName}",
  "last_name": "{respondentLastName}",
  "candidate_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/show",
  "custom_status": {
    "id": "{customStatusId}",
    "name": "{customStatusName}",
    "slug": "{customStatusSlug}"
  },
  "synthesis_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/generate/synthesis.pdf",
  "documents": {
    "synthesis": {
      "data": "{base64encodedFile}"
      },
    "resume": {
      "fileName": "{fileName}",
      "extension": "{fileExtension}",
      "mimeType": "{fileMimeType}",
      "data": "{base64encodedFile}"
      }
  },
  "comments": [
      {
        "author": "{authorName}",
        "author_id": "{authorId}",
        "comment": "{authorComment}"
      }
    ]
}
```

### Description des données
Nom                    | Type         | Description
-----------------------|--------------|---------------------------------------------------
score_total_percentage | integer      | Pourcentage de réussite par rapport au score total
id                     | integer      | Id du répondant
score_auto             | integer      | Scoring automatique
score_total            | integer      | Note total
main_comment           | string       | Commentaire principal du répondant
status                 | integer      | Statut (état) du répondant
phone_number           | string       | Numéro de téléphone du répondant
email                  | string       | Email du répondant 
first_name             | string       | Prénom du répondant 
last_name              | string       | Nom du répondant 
candidate_link         | string (url) | Lien vers la fiche du répondant (nécessite d'être authentifié sur l'interface Scoringline)
custom_status          | object       | Objet représentant le statut personnalisé attribué au répondant (voir [Objet`custom_status`](#objet-custom_status))
synthesis_link         | string (url) | Lien vers la synthèse PDF du répondant (nécessite d'être authentifié sur l'interface Scoringline)
documents              | string (url) | Objet représentant les documents relatifs au répondant (voir [Objet`documents`](#objet-documents))
comments               | object       | Objet représentant les commentaires concernant le répondant (voir [Objet`comments`](#objet-comments))

#### Objet `documents`
documents  | Type   | Description
-----------|--------|---------------------------------------------------
synthesis  | object | Synthèse PDF du répondant (voir [Objet`synthesis`](#objet-synthesis))
resume     | object | CV du répondant (voir [Objet`resume`](#objet-resume))

#### Objet `synthesis`
synthesis | Type   | Description
----------|--------|--------------------------
data      | string | Document encodé en base64

#### Objet `resume`
resume    | Type   | Description
----------|--------|----------------------------------
fileName  | string | Nom du fichier avec son extension
extension | string | Extension du fichier
mimeType  | string | mimeType du fichier
data      | string | Document encodé en base64
