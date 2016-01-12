Répondre à un questionnaire
=====================================================

>**:warning: toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémentée, veuillez utiliser une url de la forme /api-saas/v1/**

Pré requis
----------

Avoir les clés suivantes pour votre compte :

* Clé API Partenaire
* Clé API Entreprise
* Clé API Utilisateur

# Table des matières
1. [Répondre à un questionnaire standard](#répondre-à-un-questionnaire-standard)
2. [Répondre à un questionnaire starter](#répondre-à-un-questionnaire-starter)

# Répondre à un questionnaire standard

## Requête

**POST** `api-saas/test/v1/partner/questionnaires/{questionnaire}/answer`

**POST** `api-saas/test/v1/partner/questionnaires/ref/{reference}/answer`

* *questionnaire (`String`)* : Le slug du questionnaire (nom simplifié). Exemple : `nom-du-questionnaire`
* *reference (`String`)* : La référence de l'offre.

Vous devez envoyer les données suivantes dans une requête http multipart (envoi de fichier) :

Nom de la donnée | Exemple de valeur
-----------------|------------------------------------
firstname        | Paul
lastname         | Charpentier
phone_number     | 0600000000
email            | paul.charpentier@scoringline.com

## Réponse

Le serveur répondra un message json ainsi qu'une code http 200:

```json
{"message": "success"}
```

# Répondre à un questionnaire starter

## Requête

**POST** `api-saas/test/v1/partner/questionnaires/{questionnaire}/answer-starter`

**POST** `api-saas/test/v1/partner/questionnaires/ref/{reference}/answer-starter`

* *questionnaire (`String`)* : Le slug du questionnaire (nom simplifié). Exemple : `nom-du-questionnaire`
* *reference (`String`)* : La référence de l'offre.

Vous devez envoyer les données suivantes dans une requête http multipart (envoi de fichier) :

Nom de la donnée | Exemple de valeur
-----------------|------------------------------------
firstname        | Paul
lastname         | Charpentier
phone_number     | 0600000000
email            | paul.charpentier@scoringline.com
cv               | Fichier binaire (pdf de préférence)

## Réponse

Le serveur répondra un message json ainsi qu'une code http 200:

```json
{"message": "success"}
```
