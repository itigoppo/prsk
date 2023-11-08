# base theme : geoffgarside
function toon {
  echo -n ""
}

# PROMPT="[%*] %n:%c $(git_prompt_info)%(!.#.$) "
PROMPT='%{$fg[magenta]%}$(toon)%{$reset_color%}%{$fg[blue]%}[%*]%{$reset_color%} %{$fg[cyan]%}%n%{$reset_color%}:%{$fg[green]%}%c%{$reset_color%}$(git_prompt_info) %(!.#.$) '

ZSH_THEME_GIT_PROMPT_PREFIX=" %{$fg[yellow]%}git:("
ZSH_THEME_GIT_PROMPT_SUFFIX=")%{$reset_color%}"
