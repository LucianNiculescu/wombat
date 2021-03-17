## Wombat Technical Challenge

### Convert Arabic to Roman (https://github.com/netsells/roman-numerals-api)

The technical challenge has been completed using the latest version of Laravel, the DB and webserver have been set with 
using Docker.

#### Docker
Files used for docker are found inside the root system of the project: `docker-compose.yml` and `Dockerfile`.
The configuration files for the webserver and DB can be found under the directory called `docker`


#### File Structure / Logic
The classes and interfaces can be found under `app/Http/Logic`. I am usually creating `Helpers` or other Classes in order to split the logic into the correct place so we 
won't end up with files containing too much code ( they usually are hard to read and understand ).

#### API
I have created a middleware that is usually getting the `Auth Token` from the User, but for testing purposes I have added the Bearer `mBu7IB6nuxh8RVzJ61f4` hardcoded. This file can be found under `app/Http/Midleware/CheckToken.php`

I am usually trying the keep the same format for all the Restful APIs by having a `$result` member with the structure:
1. Success ( bool )
2. Data ( what data comes back for a successful request )
3. Errors ( if there are any )

For the `getRecentlyConversions` API call I have used a Simple Pagination ( from Laravel ).

#### Unit Testing

I have created basic simple tests that can be found under `tests/Feature/ApiTest.php` and `test/Feature/StructureTest.php`.

##### Thank you for the given opportunity and I hope to hear from you soon
