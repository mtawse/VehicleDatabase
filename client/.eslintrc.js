module.exports = {
  root: true,
  env: {
    node: true,
  },
  extends: ['plugin:vue/essential', '@vue/airbnb'],
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'object-shorthand': 0,
    'space-before-function-paren': 0,
    'func-names': 0,
    'no-param-reassign': 0,
    'implicit-arrow-linebreak': 0,
    'arrow-params': 0,
  },
  parserOptions: {
    parser: 'babel-eslint',
  },
};
