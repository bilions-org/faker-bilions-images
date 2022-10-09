### Faker image provider

- This package do not use curl to get image from third party web links.
- Images are generated using php image-gd and normally gd extension is already included when you install php.

#### Example Usage 

```
$faker->addProvider(new FakerImageProvider($faker));
$image = $faker->image(null, 640, 480);
$filePath = Storage::disk('local')->putFileAs('seeder-images', new File($image), basename($image));
```

#### Contributors are always welcome