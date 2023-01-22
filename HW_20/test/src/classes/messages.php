<?php

class Messages
{
    private $conn;
    private string $table = 'messages';

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getCats()
    {
        $query = 'SELECT * FROM  categories';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    //ПЕРЕДЕЛАТ!!!!!!!
    public function print_categories_tree($tree, $level = 0)
    {
        if (!empty($tree)) {
            echo '<ul>';
            foreach ($tree as $category) {
                echo '<li><a href="/categories/' . $category['id'] . '">' . str_repeat('-', $level) . $category['title'] . '</a>';
                print_categories_tree($category['children'], $level + 1);
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    //Вернет иерархический список категорий
    public function getAllCategories(): array
    {
        $query = 'SELECT * FROM  categories';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $resultArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $this->createTree($resultArray);
    }

    private function generateElementTree(&$treeElement, $parentsArr): void
    {
        foreach ($treeElement as $key => $item) {
            if (!isset($item['children'])) {
                $treeElement[$key]['children'] = array();
            }
            if (array_key_exists($key, $parentsArr)) {
                $treeElement[$key]['children'] = $parentsArr[$key];
                $this->generateElementTree($treeElement[$key]['children'], $parentsArr);
            }
        }
    }


    private function createTree(array $array): array
    {
        $parentsArr = array();

        foreach ($array as $key => $item) {
            $parentsArr[$item['parent_id']][$item['id']] = $item;
        }

        $treeElement = $parentsArr[0];
        $this->generateElementTree($treeElement, $parentsArr);

        return $treeElement;
    }
}