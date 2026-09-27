<?php 
$page_title = "Home";
include('includes/config.php');
include('includes/functions.php');  
include('includes/header.php');

// Static product data with expanded categories
$static_products = array(
    // Electronics
    array('id'=>1, 'name'=>'Wireless Headphones', 'price'=>99.99, 'image'=>'https://images.unsplash.com/photo-1505740420928-5e560c06d30e', 'category'=>'electronics'),
    array('id'=>2, 'name'=>'Smart Watch', 'price'=>199.99, 'image'=>'https://images.unsplash.com/photo-1523275335684-37898b6baf30', 'category'=>'electronics'),
    array('id'=>3, 'name'=>'Bluetooth Speaker', 'price'=>59.99, 'image'=>'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb', 'category'=>'electronics'),
    array('id'=>4, 'name'=>'Portable Charger', 'price'=>29.99, 'image'=>'https://images.unsplash.com/photo-1585771724684-38269d6639fd', 'category'=>'electronics'),
    
    // Groceries
    array('id'=>5, 'name'=>'Organic Apples', 'price'=>4.99, 'image'=>'https://images.unsplash.com/photo-1568702846914-96b305d2aaeb', 'category'=>'grocery'),
    array('id'=>6, 'name'=>'Whole Grain Bread', 'price'=>3.49, 'image'=>'https://images.unsplash.com/photo-1509440159596-0249088772ff', 'category'=>'grocery'),
    array('id'=>7, 'name'=>'Organic Milk', 'price'=>5.99, 'image'=>'https://images.unsplash.com/photo-1550583724-b2692b85b150', 'category'=>'grocery'),
    array('id'=>8, 'name'=>'Free Range Eggs', 'price'=>6.99, 'image'=>'https://images.unsplash.com/photo-1587486913049-53fc88980cfc', 'category'=>'grocery'),
    
    // Home & Kitchen
    array('id'=>9, 'name'=>'Ceramic Dinner Set', 'price'=>49.99, 'image'=>'https://images.unsplash.com/photo-1581578731548-c64695cc6952', 'category'=>'home'),
    array('id'=>10, 'name'=>'Non-Stick Pan', 'price'=>39.99, 'image'=>'https://images.unsplash.com/photo-1518492104633-130d0cc84637', 'category'=>'home'),
    array('id'=>11, 'name'=>'Air Fryer', 'price'=>89.99, 'image'=>'https://images.unsplash.com/photo-1615873968403-89e068629265', 'category'=>'home'),
    array('id'=>12, 'name'=>'Coffee Maker', 'price'=>59.99, 'image'=>'https://images.unsplash.com/photo-1580554530778-ca36943938b2', 'category'=>'home'),
    
    // Fashion
    array('id'=>13, 'name'=>'Men\'s T-Shirt', 'price'=>19.99, 'image'=>'https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9', 'category'=>'fashion'),
    array('id'=>14, 'name'=>'Women\'s Dress', 'price'=>39.99, 'image'=>'https://images.unsplash.com/photo-1489987707025-afc232f7ea0f', 'category'=>'fashion'),
    array('id'=>15, 'name'=>'Running Shoes', 'price'=>79.99, 'image'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff', 'category'=>'fashion'),
    array('id'=>16, 'name'=>'Designer Handbag', 'price'=>129.99, 'image'=>'https://images.unsplash.com/photo-1590874103328-eac38a683ce7', 'category'=>'fashion'),
    
    // Beauty
    array('id'=>17, 'name'=>'Skincare Set', 'price'=>49.99, 'image'=>'https://images.unsplash.com/photo-1571781926291-c477ebfd024b', 'category'=>'beauty'),
    array('id'=>18, 'name'=>'Perfume', 'price'=>59.99, 'image'=>'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab', 'category'=>'beauty'),
    array('id'=>19, 'name'=>'Makeup Kit', 'price'=>39.99, 'image'=>'https://images.unsplash.com/photo-1625772452859-1c03d5bf1137', 'category'=>'beauty'),
    array('id'=>20, 'name'=>'Hair Dryer', 'price'=>34.99, 'image'=>'https://images.unsplash.com/photo-1519735777090-ec97162dc266', 'category'=>'beauty'),
    
    // Sports
    array('id'=>21, 'name'=>'Yoga Mat', 'price'=>24.99, 'image'=>'https://images.unsplash.com/photo-1571902943202-507ec2618e8f', 'category'=>'sports'),
    array('id'=>22, 'name'=>'Dumbbell Set', 'price'=>89.99, 'image'=>'https://images.unsplash.com/photo-1534258936925-c58bed479fcb', 'category'=>'sports'),
    array('id'=>23, 'name'=>'Running Watch', 'price'=>149.99, 'image'=>'https://images.unsplash.com/photo-1552072090-7da8e0085256', 'category'=>'sports'),
    array('id'=>24, 'name'=>'Basketball', 'price'=>29.99, 'image'=>'https://images.unsplash.com/photo-1546519638-68e109498ffc', 'category'=>'sports'),
    
    // Books
    array('id'=>25, 'name'=>'Bestseller Novel', 'price'=>14.99, 'image'=>'https://images.unsplash.com/photo-1544947950-fa07a98d237f', 'category'=>'books'),
    array('id'=>26, 'name'=>'Cookbook', 'price'=>19.99, 'image'=>'https://images.unsplash.com/photo-1541963463532-d68292c34b19', 'category'=>'books'),
    array('id'=>27, 'name'=>'Children\'s Book', 'price'=>9.99, 'image'=>'https://images.unsplash.com/photo-1589998059171-988d887df646', 'category'=>'books'),
    array('id'=>28, 'name'=>'Self-Help Guide', 'price'=>12.99, 'image'=>'https://images.unsplash.com/photo-1588666309990-d68f08e3d4a6', 'category'=>'books')
);

// Filter products by category if selected
$selected_category = isset($_GET['category']) ? $_GET['category'] : 'all';
$filtered_products = array_filter($static_products, function($product) use ($selected_category) {
    return $selected_category == 'all' || $product['category'] == $selected_category;
});

// Pagination settings
$products_per_page = 8;
$total_products = count($filtered_products);
$total_pages = ceil($total_products / $products_per_page);

// Get current page
$current_page = isset($_GET['page']) ? max(1, min($total_pages, (int)$_GET['page'])) : 1;

// Calculate offset
$offset = ($current_page - 1) * $products_per_page;

// Get products for current page
$paginated_products = array_slice($filtered_products, $offset, $products_per_page);

// All available categories
$categories = [
    'all' => 'All Products',
    'electronics' => 'Electronics',
    'grocery' => 'Groceries',
    'home' => 'Home & Kitchen',
    'fashion' => 'Fashion',
    'beauty' => 'Beauty',
    'sports' => 'Sports',
    'books' => 'Books'
];
?>



<style>
    /* Modern Color Scheme */
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --accent: #4895ef;
        --light: #f8f9fa;
        --dark: #212529;
    }
    
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        padding: 5rem 0;
        margin-bottom: 3rem;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    /* Product Cards */
    .product-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        background: white;
    }
    
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    
    .product-card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        object-position: center;
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-card-img {
        transform: scale(1.05);
    }
    
    .card-body {
        flex-grow: 1;
        padding: 1.5rem;
    }
    
    .card-title {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.75rem;
    }
    
    .price {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary);
    }
    
    .category-badge {
        background: var(--accent);
        color: white;
        font-weight: 500;
    }
    
    /* Buttons */
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        border-radius: 50px;
        padding: 0.375rem 1rem;
        font-weight: 500;
    }
    
    .btn-outline-secondary {
        border-radius: 50px;
        padding: 0.375rem 1rem;
        font-weight: 500;
    }
    
    /* Filter Buttons */
    .category-filter .btn {
        margin: 0 5px;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .category-filter .btn:hover {
        transform: translateY(-2px);
    }
    
    /* Pagination */
    .pagination .page-item.active .page-link {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    
    .pagination .page-link {
        color: var(--primary);
        margin: 0 5px;
        border-radius: 50px !important;
    }
    
    /* View All Button */
    .view-all-btn {
        background: white;
        color: var(--primary);
        border: 2px solid var(--primary);
        border-radius: 50px;
        padding: 0.5rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .view-all-btn:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
    }
    
    /* No Products Message */
    .no-products {
        background: rgba(248, 249, 250, 0.8);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .category-filter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .category-filter .btn {
            margin: 5px;
        }
        
        .hero-section {
            padding: 3rem 0;
        }
    }
</style>



<!-- Hero Section -->
<section class="hero-section">
    <div class="container text-center">
        <h1 class="display-4 font-weight-bold mb-3">Discover Amazing Products</h1>
        <p class="lead mb-4">Shop the latest trends at unbeatable prices</p>
        <a href="#products" class="btn btn-light btn-lg px-4 py-2" style="border-radius: 50px; font-weight: 600;">
            Shop Now <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</section>

<!-- Products Section -->
<div class="py-5" id="products">
    <div class="container">
        <!-- Category Filter Buttons -->
        <div class="mb-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h2 class="mb-3 mb-md-0">Featured Products</h2>
                <div class="category-filter">
                    <a href="?category=all" class="btn btn-<?php echo (!isset($_GET['category']) || $_GET['category'] == 'all') ? 'primary' : 'outline-primary'; ?>">All</a>
                    <a href="?category=electronics" class="btn btn-<?php echo isset($_GET['category']) && $_GET['category'] == 'electronics' ? 'primary' : 'outline-primary'; ?>">Electronics</a>
                    <a href="?category=grocery" class="btn btn-<?php echo isset($_GET['category']) && $_GET['category'] == 'grocery' ? 'primary' : 'outline-primary'; ?>">Groceries</a>
                    <a href="?category=fashion" class="btn btn-<?php echo isset($_GET['category']) && $_GET['category'] == 'fashion' ? 'primary' : 'outline-primary'; ?>">fashion</a>
                    <a href="?category=beauty" class="btn btn-<?php echo isset($_GET['category']) && $_GET['category'] == 'beauty' ? 'primary' : 'outline-primary'; ?>">beauty</a>
                    <a href="?category=sports" class="btn btn-<?php echo isset($_GET['category']) && $_GET['category'] == 'sports' ? 'primary' : 'outline-primary'; ?>">sports</a>
                    <a href="?category=books" class="btn btn-<?php echo isset($_GET['category']) && $_GET['category'] == 'books' ? 'primary' : 'outline-primary'; ?>">books</a>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach($paginated_products as $product): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 product-card">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top product-card-img" alt="<?php echo $product['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="price mb-2">₹<?php echo number_format($product['price'], 2); ?></p>
                        <span class="badge category-badge mb-3"><?php echo ucfirst($product['category']); ?></span>
                        <div class="d-flex justify-content-between">
                            <a href="products.php?id=<?php echo $product['id']; ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye mr-1"></i> Details
                            </a>
                            <a href="add_to_cart.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-cart-plus mr-1"></i> Add
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
            <?php if (empty($paginated_products)): ?>
                <div class="col-12">
                    <div class="no-products">
                        <i class="fas fa-search fa-3x mb-3" style="color: var(--accent);"></i>
                        <h3>No products found</h3>
                        <p class="text-muted">We couldn't find any products in this category.</p>
                        <a href="?category=all" class="btn btn-primary">Browse All Products</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <nav aria-label="Page navigation" class="mt-5">
            <ul class="pagination justify-content-center">
                <?php if ($current_page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?category=<?php echo $selected_category; ?>&page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                <?php endif; ?>
                
                <?php 
                // Show page numbers with ellipsis
                $start_page = max(1, $current_page - 2);
                $end_page = min($total_pages, $current_page + 2);
                
                if ($start_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?category='.$selected_category.'&page=1">1</a></li>';
                    if ($start_page > 2) {
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                    }
                }
                
                for ($i = $start_page; $i <= $end_page; $i++): ?>
                    <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                        <a class="page-link" href="?category=<?php echo $selected_category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; 
                
                if ($end_page < $total_pages) {
                    if ($end_page < $total_pages - 1) {
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                    }
                    echo '<li class="page-item"><a class="page-link" href="?category='.$selected_category.'&page='.$total_pages.'">'.$total_pages.'</a></li>';
                }
                ?>
                
                <?php if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?category=<?php echo $selected_category; ?>&page=<?php echo $current_page + 1; ?>" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php endif; ?>
        
        <div class="text-center mt-5">
            <a href="products.php" class="btn view-all-btn">
                View All Products <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>