Récupérer les répondants d'un questionnaire
=====================================================================

>**:warning: toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémenté, veuillez utiliser une url de la forme /api-saas/v1/**

**Pré requis**

- _Avoir une clé entreprise (api\_key), fourni par nos services_

- _Avoir une clé utilisateur (user\_key), obtenu lors de la création du client_

- _Avoir l'identifiant questionnaire (slug)_

## Table des matières

1. [Récupérer les répondants d'un questionnaire](#récupérer-les-répondants-dun-questionnaire)

2. [Récupérer un répondant d'un questionnaire](#récupérer-un-répondant-dun-questionnaire)

3. [Récupérer les répondants de son entreprise](#récupérer-les-répondants-dune-entreprise)

## Récupérer les répondants d'un questionnaire

# Requête
**POST** (ou GET sans filtres)`api-saas/v1/customer/questionnaires/{slug}/respondents.json`

# Réponse
`200` - La liste des candidats du questionnaire au format JSON
`400` - Les données que vous envoyez sont incorrectes (un message d'erreur est fourni)

# Filtres
Il est possible de filtrer les répondants d'un questionnaire selon plusieurs critères.

Les filtres disponibles sont les suivants :

Filtres                     | Type                                 | Description                                                                | Exemple 
--------------------------- |--------------------------------------|----------------------------------------------------------------------------|------------
filters[status]             | string                               | Le statut du candidat                                                      | `accepted`, `unmarked`, `waiting`
filters[customStatus]       | integer\|string\|integer[]\|string[] | Les identifiants des statuts personnalisés                                 | `a-rappeler`
filters[haveScore]          | string                               | La notation du candidat                                                    | `non_scored`, `scored_by_not_us`, `scored`, `scored_by_us`
filters[approximateKeyword] | string                               | Chaîne de caractère recherchée dans le nom et l'adresse mail des candidats | `e.bachman@yopmail.com`, `erlich`, `bachman`
filters[createdfrom]        | integer (UNIX timestamp)             | Nouvelles candidatures depuis                                              | 1451602800 
filters[lastUpdatedFrom]    | integer (UNIX timestamp)             | Candidatures mises à jour depuis                                           | 1466066108 


# Cas pratique

## Vous souhaitez récupérer l'ensemble des candidats ayant participé au questionnaire *foobar* en 2016 et ayant été acceptés.


```
POST https://api.scoringline.com/api-saas/v1/customer/questionnaires/foobar/respondents.json?api_key=yourapikey&company_key=companykey&user_key=userkey
```

Avec les paramètres, ci-dessous.

Clé                        | Valeur       
---------------------------|--------------
filters[status]            | `accepted`   
filters[createdfrom]       | `1451602800` 
filters[lastUpdatedFrom]   | `1466066108` 


Le script retournera un code `200` et l'ensemble des candidats ayant particpé au questionnaire à partir du 01/01/2016 00:00:00 et ayant été acceptés.

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
  },
]
```
### Description des données

Data             | Type          | Description                                                     |
-----------------|---------------|-----------------------------------------------------------------|
id               | integer       | Id du répondant                                                 |
score_auto       | integer       | Scoring automatique                                             |
score_total      | integer|float | Note total                                                      |
phone_number     | string        | Numéro de téléphone du répondant                                |
main_comment     | string        | Commentaire principal du répondant                              |
email            | string        | Email du répondant                                              |
first_name       | string        | Prénom du répondant                                             |
last_name        | string        | Nom du répondant                                                |
candidate_link   | string (url)  | Lien vers la fiche du répondant                                 |
synthesis_link   | string (url)  | Lien vers la synthèse PDF du répondant                          |
comments         | object        | Objet représentant les commentaires concernant le répondant     |
custom_status    | object        | Objet représentant le statut personnalisé attribué au répondant |


## Récupérer un répondant d'un questionnaire

### Requête
**GET** `api-saas/test/v1/customer/questionnaires/{slug}/respondents/{respondentId}.json`

### Réponse
`200` - Les données d'un candidat du questionnaire au format JSON

Voici les données retournées :
```json
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
  "custom_status": {
    "id": 12,
    "name": "A rappeler",
    "slug": "a-rappeler"
  },
  "synthesis_link": "https://fr.scoringline.com/admin/{yourCompanySlug}/questionnaire/foobar/repondant/9168/generate/synthesis.pdf",
  "documents": {
    "synthesis": {
      "data": "JVBERi0x..."
      },
    "resume": {
      "fileName": "cv.pdf",
      "extension": "pdf",
      "mimeType": "application/pdf",
      "data": "JVBERi0x..."
      }
  },
  "comments": [
      {
        "author": "Gavin Belson",
        "author_id": 325,
        "comment": "Ne pas rappeler"
      }
    ]
}
```
### Description des données

Data             | Type          | Description                                                                   
-----------------|---------------|-------------------------------------------------------------------------------------------
id               | integer       | Id du répondant                                                               
score_auto       | integer       | Scoring automatique                                                           
score_total      | integer|float | Note total                                                                    
phone_number     | string        | Numéro de téléphone du répondant                                              
main_comment     | string        | Commentaire principal du répondant                                            
email            | string        | Email du répondant                                                            
first_name       | string        | Prénom du répondant                                                           
last_name        | string        | Nom du répondant                                                              
candidate_link   | string        | Lien vers la fiche du répondant                                               
synthesis_link   | string        | Lien vers la synthèse PDF du répondant                                        
comments         | object        | Tableau de commentaires concernant le répondant (voir Objet `comments`)
documents        | object        | Tableau des documents (CV, synthèse) (voir Objet `documents`)
custom_status    | object        | Objet représentant le statut personnalisé attribué au répondant (voir Objet `documents`)
### Objet `comments`
comments  | Type    | Description
----------|---------|-----------------------------------------
author    | string  | Prénom et Nom de l'auteur du commentaire
author_id | integer | Id de l'auteur du commentaire
comment   | string  | Commentaire

### Objet `documents`
documents  | Type   | Description
-----------|--------|---------------------------------------------------
synthesis  | object | Synthèse PDF du répondant (voir Objet `synthesis`)
resume     | object | CV du répondant (voir Objet `resume`)

### Objet `synthesis`
synthesis | Type   | Description
----------|--------|--------------------------
data      | string | Document encodé en base64

### Objet `resume`
resume    | Type   | Description
----------|--------|----------------------------------
fileName  | string | Nom du fichier avec son extension
extension | string | Extension du fichier
mimeType  | string | mimeType du fichier
data      | string | Document encodé en base64

### Objet `custom_status`
resume | Type   | Description
-------|--------|----------------------------------
id     | integer | Id du statut personnalisé
name   | string  | Nom du statut
slug   | string  | Identifant unique (url friendly)


### Cas pratique

#### Vous souhaitez récupérer directement *la synthèse PDF d'un répondent*

```
POST|GET https://api.scoringline.com/api-saas/v1/customer/questionnaires/foobar/respondents/{respondentId}/synthesis.pdf'
```
## Récupérer les répondants de votre entreprise

### Requête
**GET** `api-saas/v1/customer/respondents.json`

### Paramêtres disponibles
Paramètres | Type    | Description                  | Valeur par défaut | Exemple
-----------|---------|------------------------------|-------------------|---------
page       | integer | Numéro de la page souhaitée  | 1                 | `&page=2`
limit      | integer | Limite du nombre de résultat | 50                |`&limit=10`


### Réponse
`200` - La liste des candidats de l'entreprise au format JSON

Voici les données retournées :

respondents    | description
---------------|---------------------------------------------------------------------------------
id             | Id du répondant 
score_auto     | Scoring automatique
score_total    | Note total
phone_number   | Numéro de téléphone du répondant
main_comment   | Commentaire principal du répondant
email          | Email du répondant 
first_name     | Prénom du répondant 
last_name      | Nom du répondant 
candidate_link | Lien vers la fiche du répondant
synthesis_link | Lien vers la synthèse PDF du répondant
status         | Statut (état) du répondant
questionnaire  | Informations (id, name, slug, offer_ref) du questionnaire lié au répondant
custom_status  | Objet représentant le statut personnalisé attribué au répondant

Les résultats sont paginés, les informations suivantes vous sont retournées par l'API :

* `previous_page` représente l'URL de la page avec les résultats précédents;
* `next_page` représente celle avec les résultats suivants;
* `total_results` représente le nombre total de répondants paginés;
* `current_page` représente le numéro de la page courante.

Exemple:
### Requête
**GET** `api-saas/v1/customer/respondents.json?&page=2&limit=2`

### Réponse
```json
{
  "items": [
    {
      "questionnaire": {
        "id": {questionnaireId},
        "name": "{questionnaireName}",
        "slug": "{questionnaireSlug}",
        "offer_ref": {questionnaireReference}
      },
      "score_total_percentage": null,
      "id": {respondentId},
      "score_auto": null,
      "score_total": null,
      "main_comment": null,
      "status": {respondentStatus},
      "phone_number": "{respondentPhoneNumber}",
      "email": "{respondentEmail}",
      "first_name": "{respondentFirstName}",
      "last_name": "{respondentLastName}",
      "candidate_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/show",
      "custom_status": {
        "id": {customStatusId},
        "name": "{customStatusName}",
        "slug": "{customStatusSlug}"
      },
      "synthesis_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/generate/synthesis.pdf"
    },
    {
            "questionnaire": {
        "id": {questionnaireId},
        "name": "{questionnaireName}",
        "slug": "{questionnaireSlug}",
        "offer_ref": {questionnaireReference}
      },
      "score_total_percentage": null,
      "id": {respondentId},
      "score_auto": null,
      "score_total": null,
      "main_comment": null,
      "status": {respondentStatus},
      "phone_number": "{respondentPhoneNumber}",
      "email": "{respondentEmail}",
      "first_name": "{respondentFirstName}",
      "last_name": "{respondentLastName}",
      "candidate_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/show",
      "custom_status": {
        "id": {customStatusId},
        "name": "{customStatusName}",
        "slug": "{customStatusSlug}"
      },
      "synthesis_link": "http://fr.scoringline.com/admin/{slugEnt}/questionnaire/{questionnaireSlug}/repondant/{respondentId}/generate/synthesis.pdf"
    }
  ],
  "total_results": 11,
  "current_page": "2",
  "nextPage": "http://api.scoringline.com/api-saas/v1/customer/respondents.json?&page=3",
  "previousPage": "http://api.scoringline.com/api-saas/v1/customer/respondents.json&page=1"
}
```
