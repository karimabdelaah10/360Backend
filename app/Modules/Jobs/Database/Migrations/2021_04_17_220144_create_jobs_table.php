tement() && bareSuper.parentPath.container === body.node.body && body.node.body.length - 1 === bareSuper.parentPath.key) {
      if (classState.superThises.length) {
        call = _core.types.assignmentExpression("=", thisRef(), call);
      }

      bareSuper.parentPath.replaceWith(_core.types.returnStatement(call));
    } else {
      bareSuper.replaceWith(_core.types.assignmentExpression("=", thisRef(), call));
    }
  }

  function verifyConstructor() {
    if (!classState.isDerived) return;
    const path = classState.userConstructorPath;
    const body = path.get("body");
    path.traverse(findThisesVisitor);

    let thisRef = function () {
      const ref = 