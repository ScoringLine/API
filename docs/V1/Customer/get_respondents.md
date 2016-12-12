Récupérer les répondants d'un questionnaire
=====================================================================

>**:warning: toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémentée, veuillez utiliser une url de la forme /api-saas/v1/**

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
* *status (`String`)* : Le statut du candidat. Example : `accepted`, `unmarked`, `waiting`
* *haveScore (`String`)* : La notation du candidat. Example : `non_scored`, `scored_by_not_us`, `scored`, `scored_by_us`
* *approximateKeyword (`String`)* : Chaîne de caractère recherchée dans le nom et l'adresse mail des candidats.
* * *from (`Int`)* : UNIX timestamp. Permet de récupérer les candidats à partir d'une date donnée

# Cas pratique

## Vous souhaitez récupérer l'ensemble des candidats ayant participé au questionnaire *foobar* en 2016 et ayant été acceptés.


```
POST https://api.scoringline.com/api-saas/v1/customer/questionnaires/foobar/respondents.json?api_key=yourapikey&company_key=companykey&user_key=userkey
```

Avec les paramètres, ci-dessous.

Clé                        | valeur                              | description
---------------------------|-------------------------------------|---------------------------------
filters[status]            | accepted                            | Par statut des répondants
filters[customStatus]      | (integer-string-integer[]-string[]) | Passer les identifiants des statuts personnalisés
filters[createdfrom]       | (integer) 1451602800                | Nouvelles candidatures depuis 
filters[lastUpdatedFrom]   | (integer) 1466066108                | Candidatures mises à jour depuis

Le script retournera un code `200` et l'ensemble des candidats ayant particpé au questionnaire à partir du 01/01/2016 00:00:00 et ayant été acceptés.

Voici les données retournées

data             | description
-----------------|------------------
id               | Id du répondant 
score_auto       | Scoring automatique
score_total      | Note total
phone_number     | Numéro de téléphone du répondant
main_comment     | Commentaire principal du répondant
email            | Email du répondant 
first_name       | Prénom du répondant 
last_name        | Nom du répondant 
candidate_link   | Lien vers la fiche du répondant (utilisateur connecté sur Scoringline) 
synthesis_link   | Lien vers la synthèse PDF du répondant (utilisateur connecté sur Scoringline) 
comments         | Tableau de commentaires concernant le répondant (voir tableau ci-dessous)
custom_status    | Objet représentant le statut personnalisé attribué au répondant

comments  | description
----------|------------------
author    | Prénom et Nom de l'auteur du commentaire
author_id | Id de l'auteur du commentaire
comment   | Commentaire

## Récupérer un répondant d'un questionnaire

### Requête
**GET** `api-saas/test/v1/customer/questionnaires/{slug}/respondents/{respondentId}.json`

### Réponse
`200` - Les données d'un candidat du questionnaire au format JSON

Voici les données retournées :

data             | description
-----------------|------------------
id               | Id du répondant 
score_auto       | Scoring automatique
score_total      | Note total
phone_number     | Numéro de téléphone du répondant
main_comment     | Commentaire principal du répondant
email            | Email du répondant 
first_name       | Prénom du répondant 
last_name        | Nom du répondant 
candidate_link   | Lien vers la fiche du répondant (utilisateur connecté sur Scoringline) 
synthesis_link   | Lien vers la synthèse PDF du répondant (utilisateur connecté sur Scoringline) 
comments         | Tableau de commentaires concernant le répondant (voir tableau ci-dessous)
documents        | Tableau des documents (CV, synthèse) (voir tableau ci-dessous)
custom_status    | Objet représentant le statut personnalisé attribué au répondant

comments  | description
----------|------------------
author    | Prénom et Nom de l'auteur du commentaire
author_id | Id de l'auteur du commentaire
comment   | Commentaire

documents  | description
-----------|------------------
synthesis  | Synthèse PDF du répondant (utilisateur connecté sur Scoringline) 
resume     | CV du répondant (utilisateur connecté sur Scoringline) 

synthesis | description
----------|------------------
data      | Document encodé en base64

resume    | description
----------|------------------
fileName  | Nom du fichier avec son extension
extension | Extension du fichier
mimeType  | mimeType du fichier
data      | Document encodé en base64


### Cas pratique

#### Vous souhaitez récupérer directement *la synthèse PDF d'un répondent*

```
POST|GET https://api.scoringline.com/api-saas/v1/customer/questionnaires/foobar/respondents/{respondentId}/synthesis.pdf'
```
## Récupérer les répondants de votre entreprise

### Requête
**GET** `api-saas/v1/customer/respondents.json`

### Paramêtres disponibles
Paramètres       | Description                  | Type    | Valeur par défaut | Exemple
-----------------|------------------------------|---------|-------------------|---------
page             | Numéro de la page souhaitée  | integer | 1                 | `&page=2`
limit            | Limite du nombre de résultat | integer | 50                |`&limit=10`


### Réponse
`200` - La liste des candidats de l'entreprise au format JSON

Voici les données retournées :

respondents      | description
-----------------|------------------
id               | Id du répondant 
score_auto       | Scoring automatique
score_total      | Note total
phone_number     | Numéro de téléphone du répondant
main_comment     | Commentaire principal du répondant
email            | Email du répondant 
first_name       | Prénom du répondant 
last_name        | Nom du répondant 
candidate_link   | Lien vers la fiche du répondant (utilisateur connecté sur Scoringline) 
synthesis_link   | Lien vers la synthèse PDF du répondant (utilisateur connecté sur Scoringline) 
status           | Statut (état) du répondant (int)
questionnaire    | Informations (id, name, slug, offer_ref) du questionnaire lié au répondant
custom_status    | Objet représentant le statut personnalisé attribué au répondant

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
