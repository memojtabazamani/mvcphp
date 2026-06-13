<?php

class Validator
{
    /*
     * In here store all errors
     *
     * Example:
     * [
        'name' => [
            'Name is required'
        ],
        'email' => [
            'Email is invalid'
        ]
    ]
     * */
    private array $errors = [];

    /**
     * @param array $data
     * Example:
     * [
     *  'name' => '',
     *  'email' => 'abc'
     * ]
     * @param array $rules
     * Example:
     * [
     *  'name' => 'required',
     *  'email' => 'required|email'
     * ]
     * @return bool
     */
    public function validate(array $data, array $rules): bool
    {
        /**
         * Example:
         * Round 1:
         * $field = name
         * $ruleString = required
         * Round 2:
         * $field = email
         * $ruleString = required|email
         */
        foreach ($rules as $field => $ruleString) {

            /*
             * Example
             * For name: ''
             * For email: 'abc'
             * */
            $value = $data[$field] ?? null;

            /*
             * Example for email: explode('|', 'required|email');
             * is:
             * [
             *  'required',
             *  'email'
             * ]
             * */
            $ruleList = explode("|", $ruleString);
            foreach ($ruleList as $rule) {
                $this->applyRule(
                    $field,
                    $value,
                    $rule
                );
            }
        }
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * @param string $field
     * @param $value
     * @param string $rule
     * @return void
     *
     * This method will apply rule
     */
    private function applyRule(
        string $field,
               $value,
        string $rule
    ): void
    {
        if ($rule === 'required') {

            if (empty($value)) {

                $this->errors[$field][]
                    = ucfirst($field)
                    . ' is required';
            }
        }

        if ($rule === 'email') {

            if (
                !filter_var(
                    $value,
                    FILTER_VALIDATE_EMAIL
                )
            ) {

                $this->errors[$field][]
                    = ucfirst($field)
                    . ' must be a valid email';
            }
        }
    }
}