#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "client.h"
#include "dialog.h"
MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::on_pushButton_clicked()
{
    client C;
    C.setcin(ui->lineEdit_CIN->text());
    C.setnom(ui->lineEdit_nom->text());
    C.setprenom(ui->lineEdit_prenom->text());
    Dialog d;
    d.setclient(C);
    d.exec();
}

