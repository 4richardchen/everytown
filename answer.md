Some notes to further prove I know what I'm doing.

Paths to my former AWS WP instance where I tested it. I obviously stopped paying for the instance once I saw they'd accessed my site so the links fail.

* [route](https://3.81.87.193/wp-json/wp/v2/contact-us)
* [show one custom post](https://3.81.87.193/wp-json/wp/v2/contact/6)
* [show all custom posts](https://3.81.87.193/wp-json/wp/v2/contact)

I used reference like a normal person:

* [add API controller](https://jacobmartella.com/2017/12/22/simple-guide-adding-wp-rest-api-controller/)
* [cpt with custom fields](https://wordpress.stackexchange.com/questions/77201/programmatically-publish-a-post-custom-post-type-with-custom-fields)
* [cpt with custom fields](https://blog.teamtreehouse.com/adding-custom-fields-to-a-custom-post-type-the-right-way)
* [add custom field](https://wordpress.stackexchange.com/questions/331832/how-to-return-meta-data-from-the-rest-api)

I tested my code by putting what would be rest-route.php into the functions.php on the server
```
ssh -i ~/.ssh/id_rsa bitnami@ec2-3-81-87-193.compute-1.amazonaws.com
vi -n 780 /home/bitnami/apps/wordpress/htdocs/wp-content/themes/twentytwenty/functions.php
```
It'd been better to scp the whole file over after spending time reconfiguring the whole system:
```
scp -i ~/.ssh/id_rsa rest-route.php bitnami@ec2-3-81-87-193.compute-1.amazonaws.com:/home/bitnami/apps/wordpress/htdocs/wp-content/themes/twentytwenty/rest.php
```
but I didn't want to spend any such time.

I know that file path since I checked at [wp-admin](https://3.81.87.193/wp-login.php?redirect_to=https%3A%2F%2F3.81.87.193%2Fwp-admin%2F&reauth=1) for which theme was active.

Do a var_dump on what function.php receives as the POST submission:
```php
[{"id":6,"date":"2020-03-11T00:51:10","date_gmt":"2020-03-11T00:51:10","guid":{"rendered":"https:\/\/3.81.87.193\/contact\/title2-2\/"},"modified":"2020-03-11T00:51:10","modified_gmt":"2020-03-11T00:51:10","slug":"title2-2","status":"publish","type":"contact","link":"https:\/\/3.81.87.193\/contact\/title2-2\/","title":{"rendered":"title2"},"content":{"rendered":"<p>content2<\/p>\n","protected":false},"template":"","_links":{"self":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/contact\/6"}],"collection":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/contact"}],"about":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/types\/contact"}],"wp:attachment":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/media?parent=6"}],"curies":[{"name":"wp","href":"https:\/\/api.w.org\/{rel}","templated":true}]}},{"id":5,"date":"2020-03-11T00:48:56","date_gmt":"2020-03-11T00:48:56","guid":{"rendered":"https:\/\/3.81.87.193\/contact\/title2\/"},"modified":"2020-03-11T00:48:56","modified_gmt":"2020-03-11T00:48:56","slug":"title2","status":"publish","type":"contact","link":"https:\/\/3.81.87.193\/contact\/title2\/","title":{"rendered":"title2"},"content":{"rendered":"<p>content2<\/p>\n","protected":false},"template":"","_links":{"self":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/contact\/5"}],"collection":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/contact"}],"about":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/types\/contact"}],"wp:attachment":[{"href":"https:\/\/3.81.87.193\/wp-json\/wp\/v2\/media?parent=5"}],"curies":[{"name":"wp","href":"https:\/\/api.w.org\/{rel}","templated":true}]}}]

	object(WP_REST_Request)#1268 (8) {
  ["method":protected]=>
  string(4) "POST"
  ["params":protected]=>
  array(6) {
    ["URL"]=>
    array(0) {
    }
    ["GET"]=>
    array(0) {
    }
    ["POST"]=>
    array(3) {
      ["sender_name"]=>
      string(2) "n2"
      ["sender_email"]=>
      string(14) "e2@comcast.net"
      ["sender_message"]=>
      string(2) "m2"
    }
    ["FILES"]=>
    array(0) {
    }
    ["JSON"]=>
    NULL
    ["defaults"]=>
    array(0) {
    }
  }
  ["headers":protected]=>
  array(10) {
    ["accept_encoding"]=>
    array(1) {
      [0]=>
      string(17) "gzip, deflate, br"
    }
    ["accept_language"]=>
    array(1) {
      [0]=>
      string(5) "en-us"
    }
    ["content_length"]=>
    array(1) {
      [0]=>
      string(2) "62"
    }
    ["user_agent"]=>
    array(1) {
      [0]=>
      string(119) "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_3) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Safari/605.1.15"
    }
    ["accept"]=>
    array(1) {
      [0]=>
      string(3) "*/*"
    }
    ["connection"]=>
    array(1) {
      [0]=>
      string(10) "keep-alive"
    }
    ["cookie"]=>
    array(1) {
      [0]=>
      string(253) "wp-settings-time-1=1583901954; wordpress_logged_in_8ef9ea1897fb3257608e628229d14532=user%7C1585093037%7CEDMJHdJkVhipW6KgPiHxis7nUICFIIO1zSg3rw5nJ37%7Cbc122b2d1fe41f90e6437b314c8dcb31e1f315ba7d54b5bf5a4bf7bbfd88a909; wordpress_test_cookie=WP+Cookie+check"
    }
    ["origin"]=>
    array(1) {
      [0]=>
      string(7) "file://"
    }
    ["content_type"]=>
    array(1) {
      [0]=>
      string(48) "application/x-www-form-urlencoded; charset=UTF-8"
    }
    ["host"]=>
    array(1) {
      [0]=>
      string(11) "3.81.87.193"
    }
  }
  ["body":protected]=>
  string(62) "sender_name=n2&sender_email=e2%40comcast.net&sender_message=m2"
  ["route":protected]=>
  string(17) "/wp/v1/contact-us"
  ["attributes":protected]=>
  array(6) {
    ["methods"]=>
    array(1) {
      ["POST"]=>
      bool(true)
    }
    ["accept_json"]=>
    bool(false)
    ["accept_raw"]=>
    bool(false)
    ["show_in_index"]=>
    bool(true)
    ["args"]=>
    array(0) {
    }
    ["callback"]=>
    string(19) "handle_contact_form"
  }
  ["parsed_json":protected]=>
  bool(true)
  ["parsed_body":protected]=>
  bool(false)
}
```