# Upload product images with Larvel 5.7


To set up the application in your server you need to create MYSQL database called “testdb”. Run the command “php artisan migrate” as command line arguments to create database tables. To seed "photos" table with the provided data from Json API, the following commands need to be executed:

```
php artisan db:seed
```

This command seeds the table with Json formatted data being looped through with the execustion of the following method:

```
public function run()
{
        DB::table('photos')->delete();
		$json = file_get_contents("https://raw.githubusercontent.com/pricesearcher/web-developer-code-test/master/test_data.json");
		$jsonObj = json_decode($json);
		foreach($jsonObj as $obj){
			Photos::create(array(
				'id' => $obj->id,
				'descr' => $obj->descr
			));
		}
 }

```


