add ```TwinElements\SeoBundle\TwinElementsSeoBundle::class => ['all' => true],``` in bundles.php

add Seo to entity
```
/**
 * @ORM\Table(name="test")
 */
class Test implements SeoInterface
{
    use SeoTrait;
}
```

add Seo fields to forms
```
class TesteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('seo', SeoType::class);        
    }
}
```

add in form layout 
```
{% use '@TwinElementsSeo/seo-fields.html.twig' %}
```

Displaying meta tags on the page
```
TestController extends AbstractController{
    public function test(SeoMetaGenerator $seoGenerator){
    
        $seo = new Seo();
    
        $seoGenerator->generate($seo, $url, $imageUrl);
        
    }
}
```
