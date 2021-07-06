<?php
namespace App\Enum\RouteNames;

class AdminRouteNamesEnum {
    public const page_index = 'page.admin.index';

    public const page_articles_index = 'page.admin.articles.index';
    public const page_articles_create = 'page.admin.articles.create';
    public const page_articles_edit = 'page.admin.articles.edit';
    public const articles_store = 'admin.articles.store';
    public const articles_update = 'admin.articles.update';
    public const articles_destroy = 'admin.articles.delete';

    public const page_questions_index = 'page.admin.questions.index';
    public const page_questions_create = 'page.admin.questions.create';
    public const page_questions_edit = 'page.admin.questions.edit';
    public const questions_store = 'admin.questions.store';
    public const questions_update = 'admin.questions.update';
    public const questions_destroy = 'admin.questions.delete';

    public const page_categories_index = 'page.admin.categories.index';
    public const page_categories_edit = 'page.admin.categories.edit';
    public const сategories_store = 'admin.categories.store';
    public const categories_update = 'admin.categories.update';
    public const categories_destroy = 'admin.categories.delete';

    public const page_tags_index = 'page.admin.tags.index';
    public const page_tags_edit = 'page.admin.tags.edit';
    public const tags_store = 'admin.tags.store';
    public const tags_update = 'admin.tags.update';
    public const tags_destroy = 'admin.tags.delete';

    public const page_comments_index = 'page.admin.comments.index';
    public const page_comments_edit = 'page.admin.comments.edit';
    public const сomments_update = 'admin.comments.update';
    public const comments_toggle_approve = 'admin.comments.toggleApprove';
    public const comments_destroy = 'admin.comments.delete';

    public const page_users_index = 'page.admin.users.index';
    public const page_users_create = 'page.admin.users.create';
    public const page_users_edit = 'page.admin.users.edit';
    public const users_store = 'admin.users.store';
    public const users_update = 'admin.users.update';
    public const users_destroy = 'admin.users.delete';
    public const users_toggle_ban = 'admin.users.toggleBan';

    public const page_gallery_index = 'page.admin.gallery.index';
    // public const page_users_create = 'page.admin.users.create';
    // public const page_users_edit = 'page.admin.users.edit';
    // public const gallery_store = 'admin.gallery.store';
    // public const users_update = 'admin.users.update';
    // public const users_destroy = 'admin.users.delete';
    // public const users_toggle_ban = 'admin.users.toggleBan';
}
