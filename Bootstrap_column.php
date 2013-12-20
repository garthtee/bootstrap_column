<?php

/**
Plugin Name: Bootstrap Column
Plugin URI: http://meigwilym.com
Description: Add bootstrap columns to your widget areas 
Version: 1.0
Author: Mei Gwiym
Author URI: http://meigwilym.com
Text Domain: bootstrap_column
License: GPLv2
 */

class Bootstrap_column extends WP_Widget {

  // constructor
  function Bootstrap_column()
  {
    parent::WP_Widget(false, $name = __('Bootstrap Column', 'bootstrap_column') );
  }

  // widget form creation
  function form($instance)
  {
    if($instance)
    {
      $title = esc_attr($instance['title']);
      $icon = esc_attr($instance['icon']);
      $text = esc_textarea($instance['text']);
      // columns
      $lg = esc_attr($instance['lg']);
      $md = esc_attr($instance['md']);
      $sm = esc_attr($instance['sm']);
      $xs = esc_attr($instance['xs']);      
    }
    else
    {
      $title = '';
      $icon = 'check'; // fa-check http://fontawesome.io/icon/check/
      $text = '';
      // columns
      $lg = '12';
      $md = '12';
      $sm = '12';
      $xs = '12';  
    }
    ?>
    
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Column Title', 'bootstrap_column'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('FA Icon', 'bootstrap_column'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Column Text:', 'bootstrap_column'); ?></label>
<textarea class="widefat"  id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo html_entity_decode($text); ?></textarea>
</p>

<h4>Display</h4>


<p>
<label for="<?php echo $this->get_field_id('lg'); ?>"><?php _e('Large (col-lg-x)', 'bootstrap_column'); ?></label>
<?php echo $lg;?>
<select style="float:right" id="<?php echo $this->get_field_id('lg'); ?>" name="<?php echo $this->get_field_name('lg') ?>">
  <?php
  for($i=1;$i<=12;$i++)
  {
    echo '<option value="'.$i.'"';
    if($i == $lg) echo ' selected';
    echo '>'.$i.'</option>';
  }
  ?>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('md'); ?>"><?php _e('Medium (col-md-x)', 'bootstrap_column'); ?></label>
<select style="float:right" id="<?php echo $this->get_field_id('md'); ?>" name="<?php echo $this->get_field_name('md') ?>">
  <?php
  for($i=1;$i<=12;$i++)
  {
    echo '<option value="'.$i.'"';
    if($i == $md) echo ' selected';
    echo '>'.$i.'</option>';    
  }
  ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id('sm'); ?>"><?php _e('Small (col-sm-x)', 'bootstrap_column'); ?></label>
<select style="float:right" id="<?php echo $this->get_field_id('sm'); ?>" name="<?php echo $this->get_field_name('sm') ?>">
  <?php
  for($i=1;$i<=12;$i++)
  {
    echo '<option value="'.$i.'"';
    if($i == $sm) echo ' selected';
    echo '>'.$i.'</option>';    
  }
  ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id('xs'); ?>"><?php _e('Extra Small (col-xs-x)', 'bootstrap_column'); ?></label>
<select style="float:right" id="<?php echo $this->get_field_id('xs'); ?>" name="<?php echo $this->get_field_name('xs') ?>">
  <?php
  for($i=1;$i<=12;$i++)
  {
    echo '<option value="'.$i.'"';
    if($i == $xs) echo ' selected';
    echo '>'.$i.'</option>';    
  }
  ?>
</select>
</p>
    <?php
  }

  // widget update
  function update($new_instance, $old_instance)
  {
    // update widget
    $instance = $old_instance;
    // Fields
    $instance['icon'] = strip_tags($new_instance['icon']);
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['text'] = sanitize_text_field($new_instance['text']);

    $instance['lg'] = strip_tags($new_instance['lg']);
    $instance['md'] = strip_tags($new_instance['md']);
    $instance['sm'] = strip_tags($new_instance['sm']);
    $instance['xs'] = strip_tags($new_instance['xs']);
    
    return $instance;
  }

  // widget display
  function widget($args, $instance)
  {
    extract($args);
    
    // these are the widget options
    $title = apply_filters('widget_title', $instance['title']);
    $icon = $instance['icon'];
    $text = html_entity_decode($instance['text']);
    
    $col['lg'] = $instance['lg'];
    $col['md'] = $instance['md'];
    $col['sm'] = $instance['sm'];
    $col['xs'] = $instance['xs'];
    
    // create the classes
    $col_class = '';    
    foreach($col as $key => $val)
    {
      if($val == '12') continue;
      $col_class .= ' col-'.$key.'-'.$val;
    }
    
    echo $before_widget;
    
    echo '<div class="bootstrap_column_box '.$col_class.'">';
        
    if ( $title ) {
      echo $before_title;
      if($icon) echo '<i class="icon-'.$icon.'"></i> ';
      echo $title . $after_title;
    }

    if($text) {
       echo '<p class="bootstrap_column_text">'.$text.'</p>';
    }
    
    echo '</div>';
    
    echo $after_widget;
  }

}

add_action( 'widgets_init', function(){
     register_widget('Bootstrap_column');
});