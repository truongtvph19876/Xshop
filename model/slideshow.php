<?php
function getSlides()
{
    $sql = "SELECT * FROM  slideshow";
    $listSlide = pdo_query($sql);
    return $listSlide;
}

function getSlide($id = 0)
{
    $sql = "SELECT * FROM  slideshow WHERE id = '$id'";
    $slide = pdo_query_one($sql);
   
    return  $slide;
}

function insertSlide($img, $info = '')
{
    $sql = '';

    if (!empty($img)) {
        $sql .= "INSERT INTO slideshow (`img`, `info`) VALUES ('$img', '$info')";
    }

    pdo_execute($sql);
}

function deleteSlide($id = 0)
{
    $sql = "DELETE FROM slideshow WHERE `id` = '$id'";
    pdo_execute($sql);
}

function updatMultipleSlides($array = [])
{
    // echo '<pre>';
    // print_r($array);
    // echo '</pre>';

    $sql = '';
    
    foreach ($array['info'] as $key => $value) {

        // lấy slide theo id
        $slide = getSlide($key);
        
        if (isset($slide['id']) && $slide['id'] == $key) {
            /**
             * 3 trường hợp
             * 1. image và info đều được thay đổi
             * 2. image được thay đổi
             * 3. info được thay đổi
             */
            
             //1. trường hợp image và info đều được thay đổi
             if (isset($slide['info']) && $slide['info'] != $value && !empty($array['image'][$key]['name'])) {
                $target = 'uploads/images/slideImg/' . $array['image'][$key]['name'];
                move_uploaded_file($array['image'][$key]['tmp_name'], '../'.$target);
                $sql = "UPDATE slideshow SET
                        `img` = '$target',
                        `info` = '$value'
                        WHERE id = '$key';";
                // echo $sql . '<br>';
                pdo_execute($sql);
            } else {
                //2. trường hợp image được thay đổi
                if (!empty($array['image'][$key]['name'])) {
                    $target = 'uploads/images/slideImg/' . $array['image'][$key]['name'];
                    move_uploaded_file($array['image'][$key]['tmp_name'], '../'.$target);
                    $sql = "UPDATE slideshow SET
                            `img` = '$target'
                            WHERE id = '$key';";
                    // echo $sql . '<br>';
                    pdo_execute($sql);
                } 
                //3. trường hợp info được thay đổi
                else if (isset($slide['info']) && $slide['info'] != $value) {
                    $sql = "UPDATE slideshow SET
                            `info` = '$value'
                            WHERE id = '$key';";
                    // echo $sql . '<br>';
                    pdo_execute($sql);
                }
            }
        }
    }

}