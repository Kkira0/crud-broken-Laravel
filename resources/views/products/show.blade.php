<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Show all products</h1>
    <p>
        Name: {{$products->name}}
    </p>
    <p>
        Quantity: {{$products->qty}}
    </p>
    <p>
        Price: {{$products->price}}
    </p>
    <p>
        Description: {{$products->description}}
    </p>
    <a href="/products">Back to products</a>
</body>
</html>