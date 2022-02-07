FROM debian:bullseye

ARG NODE_VERSION=16
ARG USERNAME
ARG EMAIL
ARG PASSWORD

RUN apt-get update && apt-get install -y \
    apt-utils \
    git \
    bash-completion \
    build-essential \
    sudo \
    curl \
    wget \
    nano \
    vim \
    zip \
    unzip \
    apt-transport-https \
    lsb-release \
    ca-certificates \
    iputils-ping \
    net-tools \
    traceroute

# |--------------------------------------------------------------------------
# | NodeJS
# |--------------------------------------------------------------------------
# |
# | Installs NodeJS and npm. The later will allow you to easily manage
# | your frontend dependencies.
# | Also installs yarn. It provides some nice improvements over npm.
# | Also installs VueCLI globally using yarn.
# | Also installs AngularCLI globally using yarn.
# |
RUN apt-get update && \
    apt-get install -y --no-install-recommends gnupg && \
    curl -sL https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash - && \
    apt-get update && \
    apt-get install -y --no-install-recommends nodejs && \
    curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && \
    apt-get install -y --no-install-recommends yarn && \
    yarn global add @vue/cli && \
    yarn global add @angular/cli && \
    npm install -g npm

COPY ./.bash_prompt /etc/.bash_prompt
RUN { \
    echo "alias lt='ls --human-readable --size -1 -S --classify'"; \
    echo "alias ll='ls --color=auto -alF'"; \
    echo "alias la='ls --color=auto -alF'"; \
    echo "alias l='ls --color=auto -CF'"; \
    echo "alias grep='grep --color=auto'"; \
    echo "alias egrep='egrep --color=auto'"; \
    echo "alias fgrep='fgrep --color=auto'"; \
    echo "alias df='df -H'"; \
    echo "alias du='du -ch'"; \
    echo "alias cpv='rsync -ah --info=progress2'"; \
    echo "alias tailf='tail -f'"; \
    echo ""; \
    echo "if [ -f /etc/.bash_prompt ]; then"; \
    echo "    . /etc/.bash_prompt"; \
    echo "fi"; \
    } >> /etc/bash.bashrc

# Create user with sudo privileges
RUN useradd -ms /bin/bash ${USERNAME} && \
    usermod -aG sudo ${USERNAME} && \
    echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

RUN git config --global user.name ${USERNAME} && \
    git config --global user.email ${EMAIL}

WORKDIR /var/www

USER ${USERNAME}

#CMD npm run serve