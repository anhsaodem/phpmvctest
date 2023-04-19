<h1>Danh sách sản phẩm</h1>
<h2>{{$title}}</h2>
<div>
    {{
        '<p>Unicode</p>'
    }}
</div>
<div>
    {!!$content!!}
</div>
@foreach ($products as $items)
    @foreach ($items as $item)
    <li>{{$item}}<li>
    @endforeach
@endforeach
<?php
// echo $title;
// $laptops = $products['laptops'];
// $telephones = $products['telephones'];
// echo '<ul><li>Máy tính:<ul>';
// foreach ($laptops as $laptop) {
//     echo '<li>' . $laptop . '</li>';
// }
// echo '</ul></li><li>Điện thoại:<ul>';
// foreach ($telephones as $telephone) {
//     echo '<li>' . $telephone . '</li>';
// }
// echo '</ul></li></ul>';

?>
