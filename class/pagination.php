<?php
if (!class_exists('WP_List_Table'))
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class B5F_WP_Table extends WP_List_Table {

    private $order;
    private $orderby;
    private $posts_per_page = 10;

    public function __construct() {
        parent :: __construct(array(
            'singular' => 'table example',
            'plural' => 'table examples',
            'ajax' => true
        ));
        $this->set_order();
        $this->set_orderby();
        $this->prepare_items();
        $this->display();
    }

    private function get_sql_results() {
        global $wpdb;
        $args = array('id', 'fname', 'subject', 'email', 'msgtext', 'created_date');
        $sql_select = implode(', ', $args);
        $sql_results = $wpdb->get_results("SELECT $sql_select FROM " . $wpdb->prefix . "tat_contacts WHERE is_active=1 ORDER BY $this->orderby $this->order ");
        
        return $sql_results;
    }

    public function set_order() {
        $order = 'DESC';
        if (isset($_GET['order']) AND $_GET['order'])
            $order = $_GET['order'];
        $this->order = esc_sql($order);
    }

    public function set_orderby() {
        $orderby = 'id';
        if (isset($_GET['orderby']) AND $_GET['orderby'])
            $orderby = $_GET['orderby'];
        $this->orderby = esc_sql($orderby);
    }


    /**
     * @see WP_List_Table::get_views()
     */
    public function get_views() {
        return array();
    }

    /**
     * @see WP_List_Table::get_columns()
     */
    public function get_columns() {
        $columns = array(
            'id' => __('ID'),
            'fname' => __('Name'),
            'subject' => __('Subject'),
            'msgtext' => __('Message'),
            'created_date' => __('Date'),
            'manage' => __('Manage')
        );
        return $columns;
    }

    /**
     * @see WP_List_Table::get_sortable_columns()
     */
    public function get_sortable_columns() {
        $sortable = array(
            'id' => array('ID', true),
            'created_date' => array('created_date', true)
        );
        return $sortable;
    }

    /**
     * Prepare data for display
     * @see WP_List_Table::prepare_items()
     */
    public function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array(
            $columns,
            $hidden,
            $sortable
        );

// SQL results
        $posts = $this->get_sql_results();
        empty($posts) AND $posts = array();

# >>>> Pagination
        $per_page = $this->posts_per_page;
        $current_page = $this->get_pagenum();
        $total_items = count($posts);
        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));
        $last_post = $current_page * $per_page;
        $first_post = $last_post - $per_page + 1;
        $last_post > $total_items AND $last_post = $total_items;

// Setup the range of keys/indizes that contain 
// the posts on the currently displayed page(d).
// Flip keys with values as the range outputs the range in the values.
        $range = array_flip(range($first_post - 1, $last_post - 1, 1));

// Filter out the posts we're not displaying on the current page.
        $posts_array = array_intersect_key($posts, $range);
# <<<< Pagination
// Prepare the data
        $tatcnt_mail = get_option('tatcnt_mail');
        $permalink = __('View all details:');
        foreach ($posts_array as $key => $post) {            
            //$link = get_edit_post_link($post->id);
            $no_title = __('No title set');
            $title = !$post->fname ? "<em>{$no_title}</em>" : $post->fname;
            $posts[$key]->fname = "<a title='{$permalink} {$title}' href='?page=tat_contact_details&cid={$posts[$key]->id}'>{$title}</a>";
            $posts[$key]->subject = (strlen($posts[$key]->subject) > 100)?substr($posts[$key]->subject, 0, 100) . '...': $posts[$key]->subject;
            $posts[$key]->msgtext = (strlen($posts[$key]->msgtext) > 250)?substr($posts[$key]->msgtext, 0, 250) . '...': $posts[$key]->msgtext;
            $posts[$key]->created_date = date_format(date_create($posts[$key]->created_date), 'd-M-Y');            
            $posts[$key]->manage = '<a href="?page=tat_contact_details&cid='.$posts[$key]->id.'">View</a>';
            
            if($tatcnt_mail == '1' && $posts[$key]->email != ''){
                $posts[$key]->manage .= ' / <a href="?page=tat_contact_reply&cid='.$posts[$key]->id.'">Reply</a>';
            }
            $posts[$key]->manage .= ' / <a class="deleteTatContact" id="'.$posts[$key]->id.'">Delete</a>';
        }
        $this->items = $posts_array;
    }

    /**
     * A single column
     */
    public function column_default($item, $column_name) {
        return $item->$column_name;
    }

    /**
     * Override of table nav to avoid breaking with bulk actions & according nonce field
     */
    public function display_tablenav($which) {
        ?>
        <div class="tablenav <?php echo esc_attr($which); ?>">
            <!-- 
            <div class="alignleft actions">
        <?php # $this->bulk_actions( $which );  ?>
            </div>
            -->
        <?php
        $this->extra_tablenav($which);
        $this->pagination($which);
        ?>
            <br class="clear" />
        </div>
        <?php
    }

    /**
     * Disables the views for 'side' context as there's not enough free space in the UI
     * Only displays them on screen/browser refresh. Else we'd have to do this via an AJAX DB update.
     * 
     * @see WP_List_Table::extra_tablenav()
     */
    public function extra_tablenav($which) {
        global $wp_meta_boxes;
        $views = $this->get_views();
        if (empty($views))
            return;

        $this->views();
    }

}
?>