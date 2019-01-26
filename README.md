## How to install?
```composer require shahadatzcpe/bdlocation```
## How to migrate?
``php artisan migrate``
## How to import data?
```php artisan import:bdlocation```



## Available model
```php
Shahadatzcpe\BDLocation\Models\Division
Shahadatzcpe\BDLocation\Models\District
Shahadatzcpe\BDLocation\Models\Upazila
Shahadatzcpe\BDLocation\Models\PoliceStation
Shahadatzcpe\BDLocation\Models\Union
```

#### Relationship
```php
Division
    districts      => 1 to n District
District
    policeStations => 1 to n PoliceStation
    upazilas       => 1 to n Upazila
    division       => belongs to Division
Upazila
    district       => belongs to District
    unions         => 1 to n Union
PoliceStation
    district       => belongs to District        
```
