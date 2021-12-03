<?php
/**
 * interface INewDB
 * contains basic methods for working news feed
 */
Interface INewsDB {
    /**
     * Adding new post to the news feed
     *
     * @param string $title - news headline
     * @param string $category - news category
     * @param string $description - news text
     * @param string $source - news source
     *
     * @return boolean result success / error
     */
    function saveNews ($title, $category, $description, $source);

    /**
     * Select all post from news feed
     *
     * @return array - result of the selected as in array
     */
    function getNews();

    /**
     * deleting post from news feed
     *
     * @param integer $id - identifier deleting post
     *
     * @return boolean result success / error
     */
    function deleteNews ($id);

}