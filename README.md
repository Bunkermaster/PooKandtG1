# KandT project

## Page

```sql
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(120) NOT NULL,
  `title` varchar(110) NOT NULL,
  `h1` varchar(60) NOT NULL,
  `p` varchar(3000) NOT NULL,
  `span-class` varchar(50) NOT NULL,
  `span-text` varchar(100) NOT NULL,
  `img-alt` varchar(100) NOT NULL,
  `img-src` varchar(2048) NOT NULL,
  `nav-title` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4_unicode_ci;
```

## Front office

## Back office

### index

```
GET admin/index.php?a=page.index
GET admin/index.php
GET admin/?a=page.index
GET admin/
```

```php
PageController::index()
PageModel::findAll()
PageView::index($data)
```

### show

```
GET admin/index.php?a=page.show&id={id}
GET admin/?a=page.show&id={id}
```



### add



### edit



### delete

