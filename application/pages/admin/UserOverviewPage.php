<?php

/**
 * @author Adriaan Knapen <a.d.knapen@protonmail.com>
 * @date 26-2-2017
 */
class UserOverviewPage extends PageFrame
{

    /**
     * The views to be shown as header.
     *
     * @return array|null
     */
    public function getViews(): array
    {
        return [
            'user-overview'
        ];
    }

    /**
     * Function which is called after construction and before the views are rendered.
     */
    public function beforeView()
    {
        // Get the user information of all users and parse it to the view.
        $userDataFields = [
            'id' => Login::FIELD_LOGIN_ID,
            'username' => Login::FIELD_USERNAME,
            'first_name' => User::FIELD_FIRST_NAME,
            'last_name' => User::FIELD_LAST_NAME,
            'email' => User::FIELD_EMAIL,
            'roles' => 'roles',
            'role_name' => Role::FIELD_ROLE_NAME,
        ];
        $userData = $this->ci->Login_User_LoginRole_Role->getAllUserData();

        $this->setData('userData', $userData);
        $this->setdata('userDataFields', $userDataFields);

        $this->addScript(
            '<script>
                    $(document).ready(function() {
                $(\'.data-table-responsive\').DataTable({
                    responsive: true
                });
            });
            </script>'
        );
        $this->addScript(
            '<script>
            $(".button-tooltip").tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            })
            </script>'
        );
    }

    /**
     * If the current user has access to this page.
     *
     * @return bool
     */
    public function hasAccess(): bool
    {
        return isLoggedInAndHasRole($this->ci, [Role::ROLE_ADMIN]);
    }

    /**
     * The form validation rules.
     *
     * @return array
     */
    protected function getFormValidationRules()
    {
        return null;
    }

    /**
     * Defines which models should be loaded.
     *
     * @return array;
     */
    protected function getModels(): array
    {
        return [
            LoginRole::class,
            Login_User_LoginRole_Role::class,
        ];
    }

    /**
     * Defines which libraries should be loaded.
     *
     * @return array;
     */
    protected function getLibraries(): array
    {
        return [];
    }

    /**
     * Defines which helpers should be loaded.
     *
     * @return array;
     */
    protected function getHelpers(): array
    {
        return [];
    }
}