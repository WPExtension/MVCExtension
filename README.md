# MVCExtension - a WordPress plugin mvc framework
Support PHP v8 and future++ 

WP Extension is a WordPress MVC framework. Design to build backend application wp plugin and theme maintainable and secure codes.
<br />
<br /> <b>Package WP Plugin Included installed with MVCExtension : </b>
<br /> > wpbb[dot]me Plugin Boilerplate
<br /> > CMB2 Custom field By CMB2 team
<br /> > Application Password (BasicAuth REST_API Authentication) By George Stephanis 
<br /> > JWT Authentication for WP REST API (Bearer REST_API Authentication) By Enrique Chavez 


```PHP
 // Secured Authentication Token:
 # Installed WP Plugin: https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/ 
 # Instruction:
 # Edit Your Htaccess: 
   RewriteEngine on
   RewriteCond %{HTTP:Authorization} ^(.*)
   RewriteRule ^(.*) - [E=HTTP_AUTHORIZATION:%1]
 
 # At config file
   define('JWT_AUTH_SECRET_KEY', 'your-top-secret-key');

 # Endpoint | HTTP Verb
  /wp-json/jwt-auth/v1/token | POST
  /wp-json/jwt-auth/v1/token/validate | POST

 # POSTMAN/Thunder Create and Generate Token:
 http://<domain>/wp-json/jwt-auth/v1/token?username=admin&password=admin

 HTTPS AUTHORIZATION TYPE: Bearer
 Token: 1614c2sa1c65asc
 
```

<h2></h2>

<br />MVC Extension with VueJS 
<br />https://github.com/WPExtension/MVCExtensionWithVueJS
<h2></h2>
<br />MVC Extension with VueJS and Component 
<br />https://github.com/WPExtension/MVCExtensionWithVueJSComponent
<h2></h2>
<br />MVC Extension With VueJS Component Webpack Optimization JS&CSS
<br />https://github.com/WPExtension/MVCExtensionWithVueJSComponentWebpack
<h2></h2>
<br /> WP Query post object 
<br /> Source: https://nielsoffice2017.wordpress.com/2021/11/24/wordpress-the-loop-fetch-data-from-database-wp_query-php/

```PHP
// Handling Post object in Controller
$query = new WP_Query( array( 'post_type' => 'page' ) );
$posts = $query->posts;

// @view
foreach($posts as $post) { echo $post->post_name; }
```

<br />
<h2>Thanks To:</h2>
<h5>
Github : To allow me to upload my PHP Library PHPWine Vanilla Flavour to repository<br /> 
php.net : To oppurtunity Develop web application using corePHP - PHPFrameworks<br />
WordPress : To oppurtunity Develop web site and plugin free<br />
</h5>

__LICENSE BY GPL v2.0__

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
<br />

<hr />
Would you like me to treat a cake and coffee ? <br />
Become a donor, Because with you! We can build more... 

Donate: <br />
GCash : +639650332900 <br /> 
Paypal account: syncdevprojects@gmail.com
<hr />
<br />
Thanks and good luck! 
