Création d'un répondant
=====================================================================

**Attention!! toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémentée, veuillez utiliser une url de la forme /api-saas/v1/**

**Pré requis**

- _Avoir une clé partenaire (api\_key), fourni par nos services_

- _Avoir une clé entreprise (company\_key), obtenu lors de la création du client_

- _Avoir une clé utilisateur (user\_key), obtenu lors de la création du client_

- _Avoir l'identifiant questionnaire (slug)_

# Cas pratique

Vous souhaitez créer un répondant pour un questionnaire avec un élément temps d'arrêt

```
POST https://api.scoringline.com/api-saas/test/v1/partner/questionnaires/{slug}/answer-starter?api_key=yourapikey&company_key=companykey&user_key=userkey
```

Avec les paramètres, ci-dessous.


```json
{
    "firstname": "Foo",
    "lastname": "Bar",
    "email": "foo@bar.com",
    "phone_number": "0760xxxxxx",
    "resume": "File"
}
```

Le script retournera un code 200 sous la forme de 

{
    message: "Applicant successfully created"
}

