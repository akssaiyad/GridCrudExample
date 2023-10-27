# GridCrudExample
Create Grid using UI component

Front Url : {domainName}/crudexample
-Add
-List
-View

Rest API :

Add Header : Content-Type And application/json

Get Method List: {domainName}/rest/V1/crudexample/form?searchCriteria

Get Method ById: {domainName}/rest/V1/crudexample/form/2

Post Method Create Authentication : {domainName}/rest//V1/integration/admin/token

In Body add admin details:

{
  "username": "test",
  "password": "test@123"
}

Post Method ById: {domainName}/rest/V1/crudexample/form/

In Body :

{"form":{
  "name": "test",
  "email": "test@gmail.com",
  "image": "screenshot.png",
  "store_id": "1",
  "occupation": "test occupation",
  "status": "1"
}}

Delete Method ById: {domainName}/rest/V1/crudexample/form/2

Put Method For Update Data: {domainName}/rest/V1/crudexample/form/

In Body :

{"data": {
  "crud_id": "2",
  "name": "test new",
  "email": "testnew@gmail.com",
  "image": "screenshot.png",
  "store_id": "1",
  "occupation": "test occupation new",
  "status": "0"
}}