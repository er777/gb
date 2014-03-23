<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>http://gourmetworldmarket.com/</loc>
</url>
<?php foreach($products as $product): ?>
<url>
<loc>http://<?php echo $product['User']['slug']; ?>.gourmetworldmarket.com/product/<?php echo $product['Product']['id']; ?>-<?php echo $product['Product']['slug']; ?></loc>
</url>
<?php endforeach; ?>
</urlset>
