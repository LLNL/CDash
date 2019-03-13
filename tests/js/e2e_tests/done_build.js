var LoginPage = require('../pages/login.page.js');
describe("done_build", function() {

  function toggle_done(index_url) {
    browser.get(index_url);

    // Locate the folder icon
    var folderIcon = element(by.repeater('build in buildgroup.pagination.filteredBuilds').row(0)).element(by.name('adminoptions'));

    // Make sure that we located the right img.
    expect(folderIcon.getAttribute('src')).toContain('img/folder.png');

    // Click the icon to expand the menu.
    folderIcon.click();
    browser.waitForAngular();

    expect(element(by.partialLinkText('mark as done')).isPresent()).toBe(true)

    // Find the 'mark as done' link and click it.
    var link = element(by.partialLinkText('mark as done'));
    link.click();
    browser.waitForAngular();

    // Refresh the page to make sure this build is now done.
    browser.get(index_url);
    element(by.repeater('build in buildgroup.pagination.filteredBuilds').row(0)).element(by.name('adminoptions')).click();
    expect(element(by.partialLinkText('mark as not done')).isPresent()).toBe(true);

    // Make it not done again.
    link = element(by.partialLinkText('mark as not done'));
    link.click();
    browser.waitForAngular();

    // Refresh & verify.
    browser.get(index_url);
    element(by.repeater('build in buildgroup.pagination.filteredBuilds').row(0)).element(by.name('adminoptions')).click();
    expect(element(by.partialLinkText('mark as done')).isPresent()).toBe(true);
  }

  it("toggle done for normal build", function() {
    var loginPage = new LoginPage();
    loginPage.login();
    toggle_done('index.php?project=InsightExample');
  });

  it("toggle done for parent build", function() {
    toggle_done('index.php?project=Trilinos&date=2011-07-22');
  });
});
