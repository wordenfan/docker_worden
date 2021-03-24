# docker build -t worden/python ./python
# docker run -d --name=pythonW -p 5000:5000  -v ~/Code/worden/python:/worden/python --link src_mysqlW_1:src_mysqlW_1 --link src_redisW_1:src_redisW_1 --link src_mongoW_1:src_mongoW_1 -it worden/python


FROM python:3.5

ADD ./requirements.txt  /worden/python/requirements.txt

WORKDIR /worden/python

RUN pip install -r requirements.txt

EXPOSE 5000

# 一些常用的 requirements.txt
# alembic==0.8.6
# bleach==1.4.3
# click==6.6
# dominate==2.2.1
# Flask==0.11.1
# Flask-Bootstrap==3.3.6.0
# Flask-Login==0.3.2
# Flask-Migrate==1.8.1
# Flask-Moment==0.5.1
# Flask-PageDown==0.2.1
# Flask-Script==2.0.5
# Flask-SQLAlchemy==2.1
# Flask-WTF==0.12
# html5lib==0.9999999
# itsdangerous==0.24
# Jinja2==2.8
# Mako==1.0.4
# Markdown==2.6.6
# MarkupSafe==0.23
# PyMySQL==0.7.5
# python-editor==1.0.1
# six==1.10.0
# SQLAlchemy==1.0.14
# visitor==0.1.3
# Werkzeug==0.11.10
# WTForms==2.1
