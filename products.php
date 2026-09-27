<?php
$page_title = "All Products";
include('includes/config.php');
include('includes/functions.php');
include('includes/header.php');

$static_products = array(
    // Electronics
    array(
        'id' => 1,
        'name' => 'Wireless Headphones',
        'price' => 99.99,
        'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=500&fit=crop&auto=format',
        'category' => 'electronics',
        'description' => 'Premium wireless headphones with noise cancellation and 30-hour battery life. Perfect for music lovers and frequent travelers.',
        'specs' => 'Bluetooth 5.0, 40mm drivers, Built-in mic, Foldable design'
    ),
    array(
        'id' => 2,
        'name' => 'Smart Watch',
        'price' => 199.99,
        'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&h=500&fit=crop&auto=format',
        'category' => 'electronics',
        'description' => 'Advanced smartwatch with health monitoring, GPS, and smartphone notifications. Water-resistant up to 50 meters.',
        'specs' => '1.4" AMOLED display, Heart rate monitor, Sleep tracking, 7-day battery'
    ),
    array(
        'id' => 3,
        'name' => 'Bluetooth Speaker',
        'price' => 59.99,
        'image' => 'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=500&h=500&fit=crop&auto=format',
        'category' => 'electronics',
        'description' => 'Portable Bluetooth speaker with rich, room-filling sound. Perfect for outdoor adventures and home use.',
        'specs' => '20W output, IPX7 waterproof, 15-hour playback, Built-in mic'
    ),
    array(
        'id' => 4,
        'name' => 'Portable Charger',
        'price' => 29.99,
        'image' => 'https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=500&h=500&fit=crop&auto=format',
        'category' => 'electronics',
        'description' => 'High-capacity portable charger for all your devices. Compact design with fast charging capability.',
        'specs' => '10000mAh battery, Dual USB ports, LED indicator, Includes charging cable'
    ),
    
    // Groceries
    array(
        'id' => 5,
        'name' => 'Organic Apples',
        'price' => 4.99,
        'image' => 'https://images.unsplash.com/photo-1568702846914-96b305d2aaeb?w=500&h=500&fit=crop&auto=format',
        'category' => 'grocery',
        'description' => 'Crisp and juicy organic apples grown without synthetic pesticides. Perfect for snacking or baking.',
        'specs' => '1lb bag, Gala variety, USDA organic certified, Refrigerate for freshness'
    ),
    array(
        'id' => 6,
        'name' => 'Whole Grain Bread',
        'price' => 3.49,
        'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=500&h=500&fit=crop&auto=format',
        'category' => 'grocery',
        'description' => 'Nutritious whole grain bread made with 100% whole wheat flour. No artificial preservatives.',
        'specs' => '20oz loaf, 12 slices, 3g fiber per slice, Kosher certified'
    ),
    array(
        'id' => 7,
        'name' => 'Organic Milk',
        'price' => 5.99,
        'image' => 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=500&h=500&fit=crop&auto=format',
        'category' => 'grocery',
        'description' => 'Fresh organic milk from pasture-raised cows. Rich in calcium and vitamin D.',
        'specs' => '1 gallon, 3.5% milkfat, Ultra-pasteurized, USDA organic'
    ),
    array(
        'id' => 8,
        'name' => 'Free Range Eggs',
        'price' => 6.99,
        'image' => 'https://images.unsplash.com/photo-1587486913049-53fc88980cfc?w=500&h=500&fit=crop&auto=format',
        'category' => 'grocery',
        'description' => 'Farm-fresh eggs from humanely raised, free-range chickens. Rich, golden yolks and superior taste.',
        'specs' => '12-count, Large size, Grade AA, Certified humane'
    ),
    
    // Home & Kitchen
    array(
        'id' => 9,
        'name' => 'Ceramic Dinner Set',
        'price' => 49.99,
        'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=500&h=500&fit=crop&auto=format',
        'category' => 'home',
        'description' => 'Elegant 16-piece ceramic dinner set for everyday use. Microwave and dishwasher safe.',
        'specs' => '4 dinner plates, 4 salad plates, 4 bowls, 4 mugs, Lead-free glaze'
    ),
    array(
        'id' => 10,
        'name' => 'Non-Stick Pan',
        'price' => 39.99,
        'image' => 'https://images.unsplash.com/photo-1518492104633-130d0cc84637?w=500&h=500&fit=crop&auto=format',
        'category' => 'home',
        'description' => 'Professional-grade non-stick frying pan with even heat distribution. Perfect for eggs, pancakes, and more.',
        'specs' => '10-inch diameter, PFOA-free coating, Oven safe to 400 F, Cool-touch handle'
    ),
    array(
        'id' => 11,
        'name' => 'Air Fryer',
        'price' => 89.99,
        'image' => 'https://images.unsplash.com/photo-1615873968403-89e068629265?w=500&h=500&fit=crop&auto=format',
        'category' => 'home',
        'description' => 'Digital air fryer that cooks with little to no oil for healthier fried food alternatives.',
        'specs' => '5.8QT capacity, 8 presets, 1700W, Dishwasher-safe basket'
    ),
    array(
        'id' => 12,
        'name' => 'Coffee Maker',
        'price' => 59.99,
        'image' => 'https://images.unsplash.com/photo-1580554530778-ca36943938b2?w=500&h=500&fit=crop&auto=format',
        'category' => 'home',
        'description' => 'Programmable drip coffee maker with thermal carafe to keep coffee hot for hours.',
        'specs' => '12-cup capacity, 24-hour programmable, Gold-tone filter included, Auto shut-off'
    ),
    
    // Fashion
    array(
        'id' => 13,
        'name' => 'Men\'s T-Shirt',
        'price' => 19.99,
        'image' => 'https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?w=500&h=500&fit=crop&auto=format',
        'category' => 'fashion',
        'description' => 'Classic fit men\'s t-shirt made from premium cotton for all-day comfort.',
        'specs' => '100% cotton, Regular fit, Crew neck, Machine washable'
    ),
    array(
        'id' => 14,
        'name' => 'Women\'s Dress',
        'price' => 39.99,
        'image' => 'https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?w=500&h=500&fit=crop&auto=format',
        'category' => 'fashion',
        'description' => 'Flattering A-line dress with short sleeves and side pockets. Perfect for casual outings.',
        'specs' => '95% cotton, 5% spandex, Machine wash, Imported'
    ),
    array(
        'id' => 15,
        'name' => 'Running Shoes',
        'price' => 79.99,
        'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&h=500&fit=crop&auto=format',
        'category' => 'fashion',
        'description' => 'Lightweight running shoes with responsive cushioning for optimal performance.',
        'specs' => 'Breathable mesh upper, Rubber outsole, Cushioned insole, Arch support'
    ),
    array(
        'id' => 16,
        'name' => 'Designer Handbag',
        'price' => 129.99,
        'image' => 'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?w=500&h=500&fit=crop&auto=format',
        'category' => 'fashion',
        'description' => 'Stylish designer handbag with multiple compartments for organization on the go.',
        'specs' => 'Genuine leather, Gold-tone hardware, Adjustable strap, 12" x 10" x 5"'
    ),
    
    // Beauty
    array(
        'id' => 17,
        'name' => 'Skincare Set',
        'price' => 49.99,
        'image' => 'https://images.unsplash.com/photo-1571781926291-c477ebfd024b?w=500&h=500&fit=crop&auto=format',
        'category' => 'beauty',
        'description' => 'Complete 3-step skincare routine for hydrated, glowing skin. Suitable for all skin types.',
        'specs' => 'Cleanser (5oz), Toner (4oz), Moisturizer (2oz), Cruelty-free, Paraben-free'
    ),
    array(
        'id' => 18,
        'name' => 'Perfume',
        'price' => 59.99,
        'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?w=500&h=500&fit=crop&auto=format',
        'category' => 'beauty',
        'description' => 'Luxury eau de parfum with floral and woody notes for a sophisticated scent that lasts.',
        'specs' => '3.4 fl oz, Alcohol-free, Vegan, 8-hour longevity'
    ),
    array(
        'id' => 19,
        'name' => 'Makeup Kit',
        'price' => 39.99,
        'image' => 'https://images.unsplash.com/photo-1625772452859-1c03d5bf1137?w=500&h=500&fit=crop&auto=format',
        'category' => 'beauty',
        'description' => 'Complete makeup palette with everything you need for a full face of glamorous makeup.',
        'specs' => '12 eyeshadows, 4 blushes, 6 lip colors, 2 highlighters, Includes brushes'
    ),
    array(
        'id' => 20,
        'name' => 'Hair Dryer',
        'price' => 34.99,
        'image' => 'https://images.unsplash.com/photo-1519735777090-ec97162dc266?w=500&h=500&fit=crop&auto=format',
        'category' => 'beauty',
        'description' => 'Professional ionic hair dryer for faster drying and reduced frizz. Lightweight and ergonomic design.',
        'specs' => '1875W, 3 heat/speed settings, Concentrator nozzle, Hanging loop'
    ),
    
    // Sports
    array(
        'id' => 21,
        'name' => 'Yoga Mat',
        'price' => 24.99,
        'image' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=500&h=500&fit=crop&auto=format',
        'category' => 'sports',
        'description' => 'Premium non-slip yoga mat with cushioning for joint support during practice.',
        'specs' => '72" x 24", 5mm thickness, Latex-free, Includes carrying strap'
    ),
    array(
        'id' => 22,
        'name' => 'Dumbbell Set',
        'price' => 89.99,
        'image' => 'https://images.unsplash.com/photo-1534258936925-c58bed479fcb?w=500&h=500&fit=crop&auto=format',
        'category' => 'sports',
        'description' => 'Adjustable dumbbell set for home workouts. Space-saving design with multiple weight options.',
        'specs' => '5-25lbs per dumbbell, Neoprene coating, Ergonomic grip, Includes storage rack'
    ),
    array(
        'id' => 23,
        'name' => 'Running Watch',
        'price' => 149.99,
       'image' => 'https://images.unsplash.com/photo-1552072090-7da8e0085256?w=500&h=500&fit=crop&auto=format',
        'category' => 'sports',
        'description' => 'GPS running watch with advanced metrics to track performance and improve training.',
        'specs' => 'Heart rate monitor, 20-hour GPS battery, Water resistant 50m, Bluetooth sync'
    ),
    array(
        'id' => 24,
        'name' => 'Basketball',
        'price' => 29.99,
        'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?w=500&h=500&fit=crop&auto=format',
        'category' => 'sports',
        'description' => 'Official size basketball with deep channels for better grip and control.',
        'specs' => 'Size 7 (29.5"), Rubber composite cover, Indoor/outdoor use, Pump included'
    ),
    
    // Books
    array(
        'id' => 25,
        'name' => 'Bestseller Novel',
        'price' => 14.99,
        'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=500&h=500&fit=crop&auto=format',
        'category' => 'books',
        'description' => 'Critically acclaimed novel that has topped bestseller lists worldwide. A must-read masterpiece.',
        'specs' => 'Paperback, 320 pages, 5.5" x 8.25", ISBN: 9781234567890'
    ),
    array(
        'id' => 26,
        'name' => 'Cookbook',
        'price' => 19.99,
        'image' => 'https://images.unsplash.com/photo-1541963463532-d68292c34b19?w=500&h=500&fit=crop&auto=format',
        'category' => 'books',
        'description' => 'Comprehensive cookbook with 100+ recipes from around the world. Beautiful photography throughout.',
        'specs' => 'Hardcover, 256 pages, 8" x 10", Full-color photos'
    ),
    array(
        'id' => 27,
        'name' => 'Children\'s Book',
        'price' => 9.99,
        'image' => 'https://images.unsplash.com/photo-1589998059171-988d887df646?w=500&h=500&fit=crop&auto=format',
        'category' => 'books',
        'description' => 'Beloved children\'s story with colorful illustrations that spark imagination and joy.',
        'specs' => 'Ages 3-7, 32 pages, 8.5" x 11", Hardcover'
    ),
    array(
        'id' => 28,
        'name' => 'Self-Help Guide',
        'price' => 12.99,
        'image' => 'https://images.unsplash.com/photo-1588666309990-d68f08e3d4a6?w=500&h=500&fit=crop&auto=format',
        'category' => 'books',
        'description' => 'Practical guide to personal development with actionable advice for positive life changes.',
        'specs' => 'Paperback, 180 pages, 6" x 9", Includes worksheets'
    )
);

// Check if viewing a single product
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $product = null;
    
    // Find the requested product
    foreach ($static_products as $item) {
        if ($item['id'] == $product_id) {
            $product = $item;
            break;
        }
    }
    
    if ($product) {
        // Display single product view
        ?>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo str_replace('w=500', 'w=800', $product['image']); ?>" class="img-fluid rounded" alt="<?php echo $product['name']; ?>">
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $product['name']; ?></h2>
                        <h4 class="text-primary">?<?php echo number_format($product['price'], 2); ?></h4>
                        <hr>
                        <p><?php echo $product['description']; ?></p>
                        <h5>Specifications:</h5>
                        <p><?php echo $product['specs']; ?></p>
                        
                        <form method="post" action="add_to_cart.php?id=<?php echo $product['id']; ?>" class="mt-4">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Qty:</label>
                                <div class="col-sm-3">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
                            <a href="products.php" class="btn btn-outline-secondary btn-lg">Back to Products</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        // Product not found
        echo '<div class="container py-5"><div class="alert alert-danger">Product not found!</div></div>';
    }
} else {
    // Display all products
    ?>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4">All Products</h1>
                    <p class="lead">Browse our complete collection</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <?php foreach ($static_products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo $product['image']; ?>" class="card-img-top product-img" alt="<?php echo $product['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text"><?php echo number_format($product['price'], 2); ?></p>
                            <p class="card-text text-muted small"><?php echo substr($product['description'], 0, 100); ?>...</p>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="products.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Details</a>
                            <a href="add_to_cart.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-secondary">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}

include('includes/footer.php');
?>