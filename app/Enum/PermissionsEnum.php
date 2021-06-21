<?php
namespace App\Enum;

class PermissionsEnum {
    public const write_articles = 'write_articles';
    public const write_questions = 'write_questions';
    public const write_comments = 'write_comments';
    public const like = 'like';
    public const vote = 'vote';

    public const manage_articles = 'manage_articles';
    public const manage_questions = 'manage_questions';
    public const manage_users = 'manage_users';
    public const manage_comments = 'manage_comments';
    public const manage_categories = 'manage_categories';
    public const manage_tags = 'manage_tags';
    public const manage_images = 'manage_images';

    public const manage_roles_and_permissions = 'manage_roles_and_permissions';

    public const remove_articles = 'remove_articles';
    public const remove_questions = 'remove_questions';
    public const remove_users = 'remove_users';
    public const remove_comments = 'remove_comments';
    public const remove_categories = 'remove_categories';
    public const remove_tags = 'remove_tags';
    public const remove_images = 'remove_images';

    public static function values() {
        return [
            self::write_articles,
            self::write_questions,
            self::write_comments,
            self::like,
            self::vote,
            self::manage_articles,
            self::manage_questions,
            self::manage_users,
            self::manage_comments,
            self::manage_categories,
            self::manage_tags,
            self::manage_images,
            self::manage_roles_and_permissions,
            self::remove_articles,
            self::remove_questions,
            self::remove_users,
            self::remove_comments,
            self::remove_categories,
            self::remove_tags,
            self::remove_images,
        ];
    }
}
