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


GraphQL Example

{domainName}/graphql

Use Post Method : Get All Data of form

query{
  allFormData {
    crud_id
    name
    email
    image
    occupation
    store_id
    status
  }
}

Use Post Method : Get Data By Id

query{
  formDataById(crud_id: 3) {
    crud_id
    name
    email
    image
    occupation
    store_id
    status
  }
}

Use Post Method : Isert New Data

mutation {
  insertFormData(
    input: {name: "test", email: "test@gmail.com", image: "image.jpg", occupation: "test occupation", store_id: "1", status: "1"}
  ) {
        message
  }
}

Use Post Method : Update existing Data

mutation {
  updateFormData(
    input: {crud_id: "10", name: "test", email: "test@gmail.com", image: "image.jpg", occupation: "test occupation", store_id: "1", status: "1"}
  ) {
        message
  }
}

Use Post Method : Delete existing Data

mutation {
  deleteFormData(
    input: {crud_id: "10"}
  ) {
        message
  }
}